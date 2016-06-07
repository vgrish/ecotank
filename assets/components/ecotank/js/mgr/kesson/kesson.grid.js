ecotank.grid.Kesson = function (config) {
	config = config || {};

	this.exp = new Ext.grid.RowExpander({
		expandOnDblClick: false,
		tpl: new Ext.Template('<p class="desc">{description}</p>'),
		renderer: function (v, p, record) {
			return record.data.description != '' && record.data.description != null ? '<div class="x-grid3-row-expander">&#160;</div>' : '&#160;';
		}
	});

	this.dd = function (grid) {
		this.dropTarget = new Ext.dd.DropTarget(grid.container, {
			ddGroup: 'dd',
			copy: false,
			notifyDrop: function (dd, e, data) {
				var store = grid.store.data.items;
				var target = store[dd.getDragData(e).rowIndex].id;
				var source = store[data.rowIndex].id;
				if (target != source) {
					dd.el.mask(_('loading'), 'x-mask-loading');
					MODx.Ajax.request({
						url: ecotank.config.connector_url,
						params: {
							action: config.action || 'mgr/kesson/sort',
							source: source,
							target: target
						},
						listeners: {
							success: {
								fn: function (r) {
									dd.el.unmask();
									grid.refresh();
								},
								scope: grid
							},
							failure: {
								fn: function (r) {
									dd.el.unmask();
								},
								scope: grid
							}
						}
					});
				}
			}
		});
	};

	this.sm = new Ext.grid.CheckboxSelectionModel();

	Ext.applyIf(config, {
		id: 'ecotank-grid-kesson',
		url: ecotank.config.connector_url,
		baseParams: {
			action: 'mgr/kesson/getlist',
			class: config.class || ''
		},
		save_action: 'mgr/kesson/updatefromgrid',
		autosave: true,
		save_callback: this._updateRow,
		fields: this.getFields(config),
		columns: this.getColumns(config),
		tbar: this.getTopBar(config),
		listeners: this.getListeners(config),

		sm: this.sm,
		plugins: this.exp,
		ddGroup: 'dd',
		enableDragDrop: true,

		autoHeight: true,
		paging: true,
		pageSize: 10,
		remoteSort: true,
		viewConfig: {
			forceFit: true,
			enableRowBody: true,
			autoFill: true,
			showPreview: true,
			scrollOffset: 0
		},
		cls: 'ecotank-grid',
		bodyCssClass: 'grid-with-buttons',
		stateful: true,
		stateId: 'ecotank-grid-kesson-state'

	});
	ecotank.grid.Kesson.superclass.constructor.call(this, config);
	this.getStore().sortInfo = {
		field: 'rank',
		direction: 'ASC'
	};
};
Ext.extend(ecotank.grid.Kesson, MODx.grid.Grid, {
	windows: {},

	getFields: function (config) {
		return [
			'id', 'model', 'ico', 'image', 'number_of_users', 'size', 'volume',
			'power', 'weight', 'price', 'old_price', 'installing_price', 'discount',
			'description', 'rank', 'main', 'active', 'actions'
		];
	},

	getTopBar: function (config) {
		var tbar = [];
		tbar.push({
			text: '<i class="icon icon-cogs"></i> ', // + _('ecotank_actions'),
			menu: [{
				text: '<i class="icon icon-plus"></i> ' + _('ecotank_action_create'),
				cls: 'ecotank-cogs',
				handler: this.create,
				scope: this
			}, {
				text: '<i class="icon icon-trash-o red"></i> ' + _('ecotank_action_remove'),
				cls: 'ecotank-cogs',
				handler: this.remove,
				scope: this
			}, '-', {
				text: '<i class="icon icon-toggle-on green"></i> ' + _('ecotank_action_turnon'),
				cls: 'ecotank-cogs',
				handler: this.active,
				scope: this
			}, {
				text: '<i class="icon icon-toggle-off red"></i> ' + _('ecotank_action_turnoff'),
				cls: 'ecotank-cogs',
				handler: this.inactive,
				scope: this
			}]
		});

		tbar.push('->');

		tbar.push({
			xtype: 'ecotank-combo-active',
			width: 190,
			custm: true,
			clear: true,
			addall: true,
			class: config.class,
			value: '',
			listeners: {
				select: {
					fn: this._filterByCombo,
					scope: this
				},
				afterrender: {
					fn: this._filterByCombo,
					scope: this
				}
			}
		});

		return tbar;
	},

	getColumns: function (config) {
		var columns = [this.exp, this.sm];
		var add = {
			id: {
				width: 10,
				sortable: true
			},
			ico: {
				width: 15,
				sortable: false,
				id: 'ecotank-grid-ico',
				renderer: function (value, metaData, record) {
					if (value) {
						return String.format('<img src="/{0}" class="ecotank-grid-ico"/>', value);
					}
					else {
						return '';
					}
				}
			},
			model: {
				width: 25,
				sortable: true,
				editor: {
					xtype: 'textfield'
				}
			},
			price: {
				width: 25,
				sortable: true,
				editor: {
					xtype: 'numberfield'
				}
			},
			old_price: {
				width: 25,
				sortable: true,
				editor: {
					xtype: 'numberfield'
				}
			},
			installing_price: {
				width: 25,
				sortable: true,
				editor: {
					xtype: 'numberfield'
				}
			},
			discount: {
				width: 25,
				sortable: true,
				editor: {
					xtype: 'textfield'
				}
			},
			actions: {
				width: 25,
				sortable: false,
				renderer: ecotank.tools.renderActions,
				id: 'actions'
			}
		};
		for (var field in add) {
			if (add[field]) {
				Ext.applyIf(add[field], {
					header: _('ecotank_header_' + field),
					tooltip: _('ecotank_tooltip_' + field),
					dataIndex: field
				});
				columns.push(add[field]);
			}
		}

		return columns;
	},

	getListeners: function (config) {
		return {
			render: {
				fn: this.dd,
				scope: this
			}
		};
	},

	getMenu: function (grid, rowIndex) {
		var ids = this._getSelectedIds();
		var row = grid.getStore().getAt(rowIndex);
		var menu = ecotank.tools.getMenu(row.data['actions'], this, ids);
		this.addContextMenuItem(menu);
	},

	onClick: function (e) {
		var elem = e.getTarget();
		if (elem.nodeName == 'BUTTON') {
			var row = this.getSelectionModel().getSelected();
			if (typeof(row) != 'undefined') {
				var action = elem.getAttribute('action');
				if (action == 'showMenu') {
					var ri = this.getStore().find('id', row.id);
					return this._showMenu(this, ri, e);
				} else if (typeof this[action] === 'function') {
					this.menu.record = row.data;
					return this[action](this, e);
				}
			}
		}
		return this.processEvent('click', e);
	},

	setAction: function (method, field, value) {
		var ids = this._getSelectedIds();
		if (!ids.length && (field !== 'false')) {
			return false;
		}
		MODx.Ajax.request({
			url: ecotank.config.connector_url,
			params: {
				action: 'mgr/kesson/multiple',
				method: method,
				field_name: field,
				field_value: value,
				ids: Ext.util.JSON.encode(ids)
			},
			listeners: {
				success: {
					fn: function () {
						this.refresh();
					},
					scope: this
				},
				failure: {
					fn: function (response) {
						MODx.msg.alert(_('error'), response.message);
					},
					scope: this
				}
			}
		})
	},

	active: function (btn, e) {
		this.setAction('setproperty', 'active', 1);
	},

	inactive: function (btn, e) {
		this.setAction('setproperty', 'active', 0);
	},

	remove: function () {
		Ext.MessageBox.confirm(
			_('ecotank_action_remove'),
			_('ecotank_confirm_remove'),
			function (val) {
				if (val == 'yes') {
					this.setAction('remove');
				}
			},
			this
		);
	},

	update: function (btn, e, row) {
		var record = typeof(row) != 'undefined' ? row.data : this.menu.record;
		MODx.Ajax.request({
			url: ecotank.config.connector_url,
			params: {
				action: 'mgr/kesson/get',
				id: record.id
			},
			listeners: {
				success: {
					fn: function (r) {
						var record = r.object;
						var w = MODx.load({
							xtype: 'ecotank-window-kesson-create',
							title: _('ecotank_action_update'),
							action: 'mgr/kesson/update',
							record: record,
							listeners: {
								success: {
									fn: this.refresh,
									scope: this
								}
							}
						});
						w.reset();
						w.setValues(record);
						w.show(e.target);
					},
					scope: this
				}
			}
		});
	},

	create: function (btn, e) {
		var record = {
			active: 1,
			class: this.getStore().baseParams.class || this.config.class
		};

		w = MODx.load({
			xtype: 'ecotank-window-kesson-create',
			record: record,
			listeners: {
				success: {
					fn: this.refresh,
					scope: this
				}
			}
		});
		w.reset();
		w.setValues(record);
		w.show(e.target);
	},

	_filterByCombo: function (cb) {
		this.getStore().baseParams[cb.name] = cb.value;
		this.getBottomToolbar().changePage(1);
	},

	_doSearch: function (tf) {
		this.getStore().baseParams.query = tf.getValue();
		this.getBottomToolbar().changePage(1);
	},

	_clearSearch: function () {
		this.getStore().baseParams.query = '';
		this.getBottomToolbar().changePage(1);
	},

	_updateRow: function () {
		this.refresh();
	},

	_getSelectedIds: function () {
		var ids = [];
		var selected = this.getSelectionModel().getSelections();

		for (var i in selected) {
			if (!selected.hasOwnProperty(i)) {
				continue;
			}
			ids.push(selected[i]['id']);
		}

		return ids;
	}

});
Ext.reg('ecotank-grid-kesson', ecotank.grid.Kesson);
