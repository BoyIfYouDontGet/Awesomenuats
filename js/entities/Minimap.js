game.MiniMap = me.Entity.extend({//launches and shows the minimap on the website
	init: function(x, y, settings) {
		this._super(me.Entity, 'init', [x, y, {
			image: "minimap",
			width: 703,
			height: 116,
			spritewidth: "703",
			spriteheight: "116",
			getShape: function(){
				return (new me.Rect(0, 0, 703, 116)).toPolygon();
			}
			}]);
			this.floating = true;

	}
});