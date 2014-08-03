<?php
/**
 * Theme: Pure Bootstrap
 * The search form template.
 * This is the template that displays the search form.
 *
 * @package Pure Bootstrap
 * @since   Pure Bootstrap 1.0
 */
?>

<?php
  $search_terms = '';
  if (isset($_GET["s"]))
    $search_terms = htmlspecialchars( $_GET["s"] );
?>
<form role="form" action="<?php bloginfo('siteurl'); ?>/" method="get">
  <div class="input-group">
    <input type="text" class="form-control search-form"  name="s" placeholder="search"<?php if ( $search_terms !== '' ) { echo ' value="' . $search_terms . '"'; } ?> />
    
    <span class="input-group-btn">
      <button type="submit" class="btn btn-primary search-btn"><i class="fa fa-search"></i>&nbsp;</button>
    </span>
  </div>
</form>