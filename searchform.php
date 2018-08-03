	<input type="checkbox" name="search__hidden-checkbox"class="search__hidden-checkbox" id="search__hidden-checkbox">
	<label for="search__hidden-checkbox" class="search__button"><span>SEARCH</span></label>
	
	<form role="search" method="get" action="<?php echo home_url('/');?>" class="search__form">
		<input type="submit" value="Search" class="search__button">
		<input type="search" class="search__input" placeholder="Search" value="<?php get_search_query(); ?>" name="s" title="Search">
	</form>
	

