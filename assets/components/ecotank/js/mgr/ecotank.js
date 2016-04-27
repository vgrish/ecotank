var ecotank = function (config) {
	config = config || {};
	ecotank.superclass.constructor.call(this, config);
};
Ext.extend(ecotank, Ext.Component, {
	page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, tools: {}
});
Ext.reg('ecotank', ecotank);

ecotank = new ecotank();