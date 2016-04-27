ecotank.window.CreatePogreb = function (config) {
    config = config || {};
    config = config || {};
    if (!config.class) {
        config.class = 'ecotankPogreb';
    }
    Ext.applyIf(config, {
        title: _('create'),
        width: 650,
        autoHeight: true,
        url: ecotank.config.connector_url,
        action: 'mgr/pogreb/create',
        fields: this.getFields(config),
        keys: [{
            key: Ext.EventObject.ENTER, shift: true, fn: function () {
                this.submit()
            }, scope: this
        }]
    });
    ecotank.window.CreatePogreb.superclass.constructor.call(this, config);
};
Ext.extend(ecotank.window.CreatePogreb, MODx.Window, {

    getFields: function (config) {
        return [{
            xtype: 'hidden',
            name: 'id'
        }, {
            xtype: 'textfield',
            fieldLabel: _('ecotank_model'),
            name: 'model',
            anchor: '99%',
            allowBlank: false
        }, {
            items: [{
                layout: 'form',
                cls: 'modx-panel',
                items: [{
                    layout: 'column',
                    border: false,
                    items: [{
                        columnWidth: .5,
                        border: false,
                        layout: 'form',
                        items: [{
                            xtype: 'numberfield',
                            fieldLabel: _('ecotank_price'),
                            name: 'price',
                            anchor: '99%',
                            allowBlank: false
                        }, {
                            xtype: 'numberfield',
                            fieldLabel: _('ecotank_old_price'),
                            name: 'old_price',
                            anchor: '99%',
                            allowBlank: true
                        }]
                    }, {
                        columnWidth: .5,
                        border: false,
                        layout: 'form',
                        cls: 'right-column',
                        items: [{
                            xtype: 'numberfield',
                            fieldLabel: _('ecotank_installing_price'),
                            name: 'installing_price',
                            anchor: '99%',
                            allowBlank: true
                        }, {
                            xtype: 'textfield',
                            fieldLabel: _('ecotank_discount'),
                            name: 'discount',
                            anchor: '99%',
                            allowBlank: true
                        }]
                    }]
                }]
            }]
        }, {
            items: [{
                layout: 'form',
                cls: 'modx-panel',
                items: [{
                    layout: 'column',
                    border: false,
                    items: [{
                        columnWidth: .25,
                        border: false,
                        layout: 'form',
                        items: [{
                            xtype: 'textfield',
                            fieldLabel: _('ecotank_size'),
                            name: 'size',
                            anchor: '99%',
                            allowBlank: true
                        }]
                    }, {
                        columnWidth: .25,
                        border: false,
                        layout: 'form',
                        items: [{
                            xtype: 'textfield',
                            fieldLabel: _('ecotank_volume'),
                            name: 'volume',
                            anchor: '99%',
                            allowBlank: true
                        }]
                    }, {
                        columnWidth: .25,
                        border: false,
                        layout: 'form',
                        items: [{
                            xtype: 'textfield',
                            fieldLabel: _('ecotank_weight'),
                            name: 'weight',
                            anchor: '99%',
                            allowBlank: true
                        }]
                    }, {
                        columnWidth: .25,
                        border: false,
                        layout: 'form',
                        items:[]/* [{
                            xtype: 'textfield',
                            fieldLabel: _('ecotank_power'),
                            name: 'power',
                            anchor: '99%',
                            allowBlank: true
                        }]*/
                    }]
                }]
            }]
        }, {
            items: [{
                layout: 'form',
                cls: 'modx-panel',
                items: [{
                    layout: 'column',
                    border: false,
                    items: [{
                        columnWidth: .25,
                        border: false,
                        layout: 'form',
                        items: [{
                            xtype: 'ecotank-combo-browser',
                            fieldLabel: _('ecotank_ico'),
                            name: 'ico',
                            anchor: '99%',
                            allowBlank: true
                        }]
                    }, {
                        columnWidth: .25,
                        border: false,
                        layout: 'form',
                        items: [{
                            xtype: 'ecotank-combo-browser',
                            fieldLabel: _('ecotank_image'),
                            name: 'image',
                            anchor: '99%',
                            allowBlank: true
                        }]
                    }, {
                        columnWidth: .25,
                        border: false,
                        layout: 'form',
                        cls: 'right-column',
                        items: []/*[{
                            xtype: 'textfield',
                            fieldLabel: _('ecotank_number_of_users'),
                            name: 'number_of_users',
                            anchor: '99%',
                            allowBlank: true
                        }]*/
                    },{
                        columnWidth: .25,
                        border: false,
                        layout: 'form',
                        cls: 'right-column',
                        items: [{
                            xtype: 'ecotank-combo-type',
                            class: config.class,
                            fieldLabel: _('ecotank_type'),
                            name: 'type',
                            anchor: '99%',
                            allowBlank: true
                        }]
                    }]
                }]
            }]
        }, {
            xtype: 'xcheckbox',
            hideLabel: true,
            boxLabel: _('ecotank_description'),
            name: '_description',
            checked: false,
            listeners: {
                check: ecotank.tools.handleChecked,
                afterrender: ecotank.tools.handleChecked
            }
        }, {
            xtype: 'textarea',
            fieldLabel: '',
            msgTarget: 'under',
            name: 'description',
            anchor: '99%',
            height: 50,
            allowBlank: true
        }, {
            xtype: 'xcheckbox',
            hideLabel: true,
            boxLabel: _('ecotank_content'),
            name: '_content',
            checked: false,
            listeners: {
                check: ecotank.tools.handleChecked,
                afterrender: ecotank.tools.handleChecked
            }
        }, {
            xtype: 'textarea',
            fieldLabel: '',
            msgTarget: 'under',
            name: 'content',
            anchor: '99%',
            height: 100,
            allowBlank: true
        }, {
            xtype: 'checkboxgroup',
            hideLabel: true,
            columns: 3,
            items: [{
                xtype: 'xcheckbox',
                boxLabel: _('ecotank_active'),
                name: 'active',
                checked: config.record.active
            }, {
                xtype: 'xcheckbox',
                boxLabel: _('ecotank_main'),
                name: 'main',
                checked: config.record.main
            }]
        }];
    },

});
Ext.reg('ecotank-window-pogreb-create', ecotank.window.CreatePogreb);
