<?php // Search Form
$value = is_search() ? get_search_query() : ''; ?>

<div class="search-form">
  <form 
  id     = "searchform" 
  role   = "search"
  method = "get"
  action = "<?= home_url(); ?>"
  >
    <input 
    type        = "text"
    value       = "<?= $value; ?>"
    name        = "s"
    id          = "searchinput"
    placeholder = "Search..."
    >
    <button type="submit" id="searchsubmit">Search...</button>
  </form>
</div>
