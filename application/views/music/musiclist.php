<?$this->load->view("includes/header.php")?>
<style>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
body {
  background: #eee;
}

.icons i {
  color: #b5b3b3;
  border: 1px solid #b5b3b3;
  padding: 6px;
  margin-left: 4px;
  border-radius: 5px;
  cursor: pointer;
}

.activity-done {
  font-weight: 600;
}

.list-group li {
  margin-bottom: 12px;
}

.list-group-item {
}

.list li {
  list-style: none;
  padding: 10px;
  border: 1px solid #e3dada;
  margin-top: 12px;
  border-radius: 5px;
  background: #fff;
}

.checkicon {
  color: green;
  font-size: 19px;
}

.date-time {
  font-size: 12px;
}

.profile-image img {
  margin-left: 3px;
}
</style>
<center><h4><?=$emo_desc?></h4></center>
<div class="list-group">
<?if (isset($response['items']))
{	
	$nextPageToken = $response['nextPageToken'];
	foreach ($response['items'] as $item) 
	{
		$videoId = $item['id']['videoId'];
		$title = $item['snippet']['title'];
		$description = $item['snippet']['description'];
		$thumbnailUrl = $item['snippet']['thumbnails']['default']['url'];
	?>
		<a href="#" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#exampleModal" onclick="set_song_name('<?=$title?>','<?=$videoId?>')"><img src="<?=$thumbnailUrl?>" /> <?=$title?></a>
	<?
	}
	 $tk = $this->uri->segment(4);
	?>
	<div class="row">
		<div class="col-sm-5"></div>
		<div class="col-sm-3">
			<nav aria-label="Page navigation example">
			<ul class="pagination">
				<?if($tk){?>
					<li class="page-item">
						<a class="page-link" href="javascript:history.back()" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
							<span class="sr-only">Previous</span>
						</a>
					</li>
				<?}?>
				<li class="page-item">
					<a class="page-link" href="<?=base_url()?>common/get_next_music_list/<?=$nextPageToken?>" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
						<span class="sr-only">Next</span>
					</a>
				</li>
			</ul>
			</nav>
		</div>
		<div class="col-sm-4"></div>
	</div>
<?
}
else
{
			echo "No any music found.";
}?>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" id="modal_title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  	<iframe width="550" id="iframediv" height="345" src="https://www.youtube.com/embed/tgbNymZ7vqY">
		</iframe>
		<div id="modalValue"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>

	function set_song_name(song_name, videoid)
	{	
		//set video url
		$video_url = "https://www.youtube.com/embed/"+videoid;

		// Get the modal element
		var modal = document.getElementById('exampleModal');

		// Set the value to the data attribute of the modal
		modal.setAttribute('data-value', $video_url);

		// Get the element where the value will be displayed
		var modalValue = document.getElementById('iframediv');
		
		// Display the value in the modal
		modalValue.src = $video_url;
		$('.modal-title').text(song_name);

	}
</script>
<?$this->load->view("includes/footer");?>
