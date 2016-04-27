Ext.namespace('ecotank.combo');


ecotank.combo.Browser = function(config) {
	config = config || {};

	if (config.length != 0 && typeof config.openTo !== "undefined") {
		if (!/^\//.test(config.openTo)) {
			config.openTo = '/' + config.openTo;
		}
		if (!/$\//.test(config.openTo)) {
			var tmp = config.openTo.split('/')
			delete tmp[tmp.length - 1];
			tmp = tmp.join('/');
			config.openTo = tmp.substr(1)
		}
	}

	Ext.applyIf(config, {
		width: 300,
		triggerAction: 'all'
	});
	ecotank.combo.Browser.superclass.constructor.call(this, config);
	this.config = config;

};
Ext.extend(ecotank.combo.Browser, Ext.form.TriggerField, {
	browser: null,

	onRender: function(ct, position) {
		this.doc = Ext.isIE ? Ext.getBody() : Ext.getDoc();
		Ext.form.TriggerField.superclass.onRender.call(this, ct, position);

		this.wrap = this.el.wrap({
			cls: 'x-form-field-wrap x-form-field-trigger-wrap'
		});
		this.trigger = this.wrap.createChild(this.triggerConfig || {
				tag: 'div',
				cls: 'x-form-trigger ' + (this.triggerClass || '')
			});
		this.initTrigger();
		if (!this.width) {
			this.wrap.setWidth(this.el.getWidth() + this.trigger.getWidth());
		}
		this.resizeEl = this.positionEl = this.wrap;

	},

	onTriggerClick: function(btn) {
		if (this.disabled) {
			return false;
		}

		//if (this.browser === null) {
		this.browser = MODx.load({
			xtype: 'modx-browser',
			id: Ext.id(),
			multiple: true,
			source: this.config.source || MODx.config.default_media_source,
			rootVisible: this.config.rootVisible || false,
			allowedFileTypes: this.config.allowedFileTypes || '',
			wctx: this.config.wctx || 'web',
			openTo: this.config.openTo || '',
			rootId: this.config.rootId || '/',
			hideSourceCombo: this.config.hideSourceCombo || false,
			hideFiles: this.config.hideFiles || true,
			listeners: {
				'select': {
					fn: function(data) {
						this.setValue(data.fullRelativeUrl);
						this.fireEvent('select', data);

						var i = Ext.get(this.config.id);
						if (i) {
							i.applyStyles('background-image: url(/' + data.fullRelativeUrl + ');background-repeat:repeat-x;');
						}

					},
					scope: this
				}
			}
		});
		//}
		this.browser.win.buttons[0].on('disable', function(e) {
			this.enable()
		})
		this.browser.win.tree.on('click', function(n, e) {
			path = this.getPath(n);
			this.setValue(path);
		}, this);
		this.browser.win.tree.on('dblclick', function(n, e) {
			path = this.getPath(n);
			this.setValue(path);
			this.browser.hide()
		}, this);
		this.browser.show(btn);
		return true;
	},

	onDestroy: function() {
		ecotank.combo.Browser.superclass.onDestroy.call(this);
	},

	getPath: function(n) {
		if (n.id == '/') {
			return '';
		}
		data = n.attributes;
		path = data.path + '/';

		return path;
	}
});
Ext.reg('ecotank-combo-browser', ecotank.combo.Browser);


ecotank.combo.Search = function (config) {
	config = config || {};
	Ext.applyIf(config, {
		xtype: 'twintrigger',
		ctCls: 'x-field-search',
		allowBlank: true,
		msgTarget: 'under',
		emptyText: _('search'),
		name: 'query',
		triggerAction: 'all',
		clearBtnCls: 'x-field-search-clear',
		searchBtnCls: 'x-field-search-go',
		onTrigger1Click: this._triggerSearch,
		onTrigger2Click: this._triggerClear
	});
	ecotank.combo.Search.superclass.constructor.call(this, config);
	this.on('render', function () {
		this.getEl().addKeyListener(Ext.EventObject.ENTER, function () {
			this._triggerSearch();
		}, this);
	});
	this.addEvents('clear', 'search');
};
Ext.extend(ecotank.combo.Search, Ext.form.TwinTriggerField, {

	initComponent: function () {
		Ext.form.TwinTriggerField.superclass.initComponent.call(this);
		this.triggerConfig = {
			tag: 'span',
			cls: 'x-field-search-btns',
			cn: [{
				tag: 'div',
				cls: 'x-form-trigger ' + this.searchBtnCls
			}, {
				tag: 'div',
				cls: 'x-form-trigger ' + this.clearBtnCls
			}]
		};
	},

	_triggerSearch: function () {
		this.fireEvent('search', this);
	},

	_triggerClear: function () {
		this.fireEvent('clear', this);
	}

});
Ext.reg('ecotank-field-search', ecotank.combo.Search);


ecotank.combo.Active = function(config) {
	config = config || {};

	if (config.custm) {
		config.triggerConfig = [{
			tag: 'div',
			cls: 'x-field-search-btns',
			style: String.format('width: {0}px;', config.clear ? 62 : 31),
			cn: [{
				tag: 'div',
				cls: 'x-form-trigger x-field-ecotank-active-go'
			}]
		}];
		if (config.clear) {
			config.triggerConfig[0].cn.push({
				tag: 'div',
				cls: 'x-form-trigger x-field-ecotank-active-clear'
			});
		}

		config.initTrigger = function() {
			var ts = this.trigger.select('.x-form-trigger', true);
			this.wrap.setStyle('overflow', 'hidden');
			var triggerField = this;
			ts.each(function(t, all, index) {
				t.hide = function() {
					var w = triggerField.wrap.getWidth();
					this.dom.style.display = 'none';
					triggerField.el.setWidth(w - triggerField.trigger.getWidth());
				};
				t.show = function() {
					var w = triggerField.wrap.getWidth();
					this.dom.style.display = '';
					triggerField.el.setWidth(w - triggerField.trigger.getWidth());
				};
				var triggerIndex = 'Trigger' + (index + 1);

				if (this['hide' + triggerIndex]) {
					t.dom.style.display = 'none';
				}
				t.on('click', this['on' + triggerIndex + 'Click'], this, {
					preventDefault: true
				});
				t.addClassOnOver('x-form-trigger-over');
				t.addClassOnClick('x-form-trigger-click');
			}, this);
			this.triggers = ts.elements;
		};
	}
	Ext.applyIf(config, {
		name: config.name || 'active',
		hiddenName: config.name || 'active',
		displayField: 'name',
		valueField: 'value',
		editable: true,
		fields: ['name', 'value'],
		pageSize: 10,
		emptyText: _('ecotank_combo_select'),
		hideMode: 'offsets',
		url: ecotank.config.connector_url,
		baseParams: {
			action: 'mgr/misc/active/getlist',
			combo: true,
			addall: config.addall || 0
		},
		tpl: new Ext.XTemplate(
			'<tpl for="."><div class="x-combo-list-item">',
			'<small>({value})</small> <b>{name}</b></span>',
			'</div></tpl>', {
				compiled: true
			}),
		cls: 'input-combo-ecotank-active',
		clearValue: function() {
			if (this.hiddenField) {
				this.hiddenField.value = '';
			}
			this.setRawValue('');
			this.lastSelectionText = '';
			this.applyEmptyText();
			this.value = '';
			this.fireEvent('select', this, null, 0);
		},

		getTrigger: function(index) {
			return this.triggers[index];
		},

		onTrigger1Click: function() {
			this.onTriggerClick();
		},

		onTrigger2Click: function() {
			this.clearValue();
		}
	});
	ecotank.combo.Active.superclass.constructor.call(this, config);

};
Ext.extend(ecotank.combo.Active, MODx.combo.ComboBox);
Ext.reg('ecotank-combo-active', ecotank.combo.Active);



ecotank.combo.Type = function(config) {
	config = config || {};

	if (config.custm) {
		config.triggerConfig = [{
			tag: 'div',
			cls: 'x-field-search-btns',
			style: String.format('width: {0}px;', config.clear ? 62 : 31),
			cn: [{
				tag: 'div',
				cls: 'x-form-trigger x-field-ecotank-type-go'
			}]
		}];
		if (config.clear) {
			config.triggerConfig[0].cn.push({
				tag: 'div',
				cls: 'x-form-trigger x-field-ecotank-type-clear'
			});
		}

		config.initTrigger = function() {
			var ts = this.trigger.select('.x-form-trigger', true);
			this.wrap.setStyle('overflow', 'hidden');
			var triggerField = this;
			ts.each(function(t, all, index) {
				t.hide = function() {
					var w = triggerField.wrap.getWidth();
					this.dom.style.display = 'none';
					triggerField.el.setWidth(w - triggerField.trigger.getWidth());
				};
				t.show = function() {
					var w = triggerField.wrap.getWidth();
					this.dom.style.display = '';
					triggerField.el.setWidth(w - triggerField.trigger.getWidth());
				};
				var triggerIndex = 'Trigger' + (index + 1);

				if (this['hide' + triggerIndex]) {
					t.dom.style.display = 'none';
				}
				t.on('click', this['on' + triggerIndex + 'Click'], this, {
					preventDefault: true
				});
				t.addClassOnOver('x-form-trigger-over');
				t.addClassOnClick('x-form-trigger-click');
			}, this);
			this.triggers = ts.elements;
		};
	}
	Ext.applyIf(config, {
		name: config.name || 'type',
		hiddenName: config.name || 'type',
		displayField: 'name',
		valueField: 'value',
		editable: true,
		fields: ['name', 'value'],
		pageSize: 10,
		emptyText: _('ecotank_combo_select'),
		hideMode: 'offsets',
		url: ecotank.config.connector_url,
		baseParams: {
			action: 'mgr/misc/type/getlist',
			combo: true,
			addall: config.addall || 0,
			class: config.class || '',
		},
		tpl: new Ext.XTemplate(
			'<tpl for="."><div class="x-combo-list-item">',
			'<small>({value})</small> <b>{name}</b></span>',
			'</div></tpl>', {
				compiled: true
			}),
		cls: 'input-combo-ecotank-type',
		clearValue: function() {
			if (this.hiddenField) {
				this.hiddenField.value = '';
			}
			this.setRawValue('');
			this.lastSelectionText = '';
			this.applyEmptyText();
			this.value = '';
			this.fireEvent('select', this, null, 0);
		},

		getTrigger: function(index) {
			return this.triggers[index];
		},

		onTrigger1Click: function() {
			this.onTriggerClick();
		},

		onTrigger2Click: function() {
			this.clearValue();
		}
	});
	ecotank.combo.Type.superclass.constructor.call(this, config);

};
Ext.extend(ecotank.combo.Type, MODx.combo.ComboBox);
Ext.reg('ecotank-combo-type', ecotank.combo.Type);