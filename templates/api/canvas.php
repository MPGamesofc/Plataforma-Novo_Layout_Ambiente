<?php if(isset($_GET["type"], $_GET["id"]) && $_GET["type"] == "game_embed"){ ?>
<style>
body {
	margin: 0;
	padding: 0;
}
</style>
<?php if($get->system("cdn_assets") == 1){ ?>
<script src="//code.jquery.com/jquery-1.12.4.min.js"></script>
<?php } else { ?>
<script src="<?php echo $get->system('site_url'); ?>/system/libs/jquery.min.js"></script>

<?php } ?>
<script>
$(document).ready(function(){
	var source = "<?php echo $data['source']; ?>";
	var height = $(window).height(); 	
	$("body").prepend('<embed src="' + source + '"></embed>'); 	
	$("embed").attr("style", "width: 100%; height: " + height + "px"); 
});
</script>
<?php } ?>

<?php if(isset($_GET["type"], $_GET["id"]) && $_GET["type"] == "user_data"){ ?>
<?php echo $data; ?>     
     

<?php } ?>

