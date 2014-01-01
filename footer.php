<!-- 
	Using CodeIgniter base_url() helper method and all javascript files are held in /www/js/ directory or subdirectories in this example. 
-->

<script type="text/javascript" src="<?=base_url()?>www/js/<?=implode(',', $this->config->item('javascript_footer'))?>"></script>
	
</body>
</html>
