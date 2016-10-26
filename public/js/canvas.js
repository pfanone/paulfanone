
$(document).ready(function() {
	console.log('loaded canvas');
});

function canvas_item(type, x, y) {
    this.item_type =  type;
    this.pos_x = x;
    this.pos_y = y;
}
