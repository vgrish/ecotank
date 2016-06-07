ecotank.panel.Main = function (config) {
    if (!config.class) {
        config.class = 'ecotankTank';
    }
    config = config || {};
    Ext.apply(config, {
        baseCls: 'modx-formpanel',
        cls: 'ecotank-formpanel',
        layout: 'anchor',
        hideMode: 'offsets',
        items: [{
            xtype: 'modx-tabs',
            defaults: {
                border: false,
                autoHeight: true,
                deferredRender: false,
                forceLayout: true
            },
            border: true,
            hideMode: 'offsets',
            items: [{
                title: _('ecotank_tanks'),
                layout: 'anchor',
                items: [{
                    html: _('ecotank_tanks_intro'),
                    cls: 'panel-desc'
                }, {
                    xtype: 'ecotank-grid-tank',
                    class: 'ecotankTank',
                    cls: 'main-wrapper'
                }]
            }, {
                title: _('ecotank_bio_tanks'),
                layout: 'anchor',
                items: [{
                    html: _('ecotank_bio_tanks_intro'),
                    cls: 'panel-desc'
                }, {
                    xtype: 'ecotank-grid-biotank',
                    class: 'ecotankBioTank',
                    cls: 'main-wrapper'
                }]
            }, {
                title: _('ecotank_uni_tanks'),
                layout: 'anchor',
                items: [{
                    html: _('ecotank_uni_tanks_intro'),
                    cls: 'panel-desc'
                }, {
                    xtype: 'ecotank-grid-unitank',
                    class: 'ecotankUniTank',
                    cls: 'main-wrapper'
                }]
            }, {
                title: _('ecotank_microb'),
                layout: 'anchor',
                items: [{
                    html: _('ecotank_microb_intro'),
                    cls: 'panel-desc'
                }, {
                    xtype: 'ecotank-grid-microb',
                    class: 'ecotankMicrob',
                    cls: 'main-wrapper'
                }]
            }, {
                title: _('ecotank_pogreb'),
                layout: 'anchor',
                items: [{
                    html: _('ecotank_pogreb_intro'),
                    cls: 'panel-desc'
                }, {
                    xtype: 'ecotank-grid-pogreb',
                    class: 'ecotankPogreb',
                    cls: 'main-wrapper'
                }]
            }, {
                title: _('ecotank_kesson'),
                layout: 'anchor',
                items: [{
                    html: _('ecotank_kesson_intro'),
                    cls: 'panel-desc'
                }, {
                    xtype: 'ecotank-grid-kesson',
                    class: 'ecotankKesson',
                    cls: 'main-wrapper'
                }]
            }]
        }]
    });
    ecotank.panel.Main.superclass.constructor.call(this, config);
};
Ext.extend(ecotank.panel.Main, MODx.Panel);
Ext.reg('ecotank-panel-main', ecotank.panel.Main);
