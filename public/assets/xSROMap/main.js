/*
 * Initialize xSROMap
 */

xSROMap.init('map');
// Add NPC's: [ { name , x , z , y , region, teleport : [ { name , x , z , y , region } , ... ] } , ...]
// Add Teleports: [ { name , x , z , y , region , type,  teleport : [ { name , x , z , y , region } , ... ] } , ...]
/*
 * Sidebar actions
 */

// sidebar dropdown menu lv.1
$(".sidebar-dropdown > a").click(function()
{
	$(".sidebar-submenu").slideUp(200);
	if ( $(this).parent().hasClass("active") )
	{
		$(".sidebar-dropdown").removeClass("active");
		$(this).parent().removeClass("active");
	} 
	else
	{
		$(".sidebar-dropdown").removeClass("active");
		$(this).next(".sidebar-submenu").slideDown(200);
		$(this).parent().addClass("active");
	}
});
// sidebar dropdown menu lv.2
$(".sidebar-submenu-dropdown > a").click(function()
{
	$(".sidebar-submenu-submenu").slideUp(200);
	if ( $(this).parent().hasClass("active") )
	{
		$(".sidebar-submenu-dropdown").removeClass("active");
		$(this).parent().removeClass("active");
	} 
	else
	{
		$(".sidebar-submenu-dropdown").removeClass("active");
		$(this).next(".sidebar-submenu-submenu").slideDown(200);
		$(this).parent().addClass("active");
	}
});