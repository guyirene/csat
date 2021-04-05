<?php
/**
 * @file
 * Template file.
 *
 * @param $enabled  true or false.
 * @param $link  link href.
 * @param $target  link target.
 * @param $class  array of classes to apply to anchor tag.
 * @param $align  left or right.
 * @param $top  distance from the top; include unit.
 * @param $image  image href.
 * @param $alt  image alt text.
 * @param $deny  paths to hide.
 * @param $allow  paths to show.
 * // Computed from image.
 * @param $height  image height in pixels.
 * @param $width  image width in pixels.
 */
?>
<link href="{{ asset('rlc/csat/css/csat.css') }}" rel="stylesheet">
<?php if (config('csat.enabled')): ?>
<div id='csat'>
  <input type="hidden" name="enabled" value="<?php print config('csat.enabled') ?>">
  <input type="hidden" name="link" value="<?php print config('csat.link') ?>">
  <input type="hidden" name="target" value="<?php print config('csat.target') ?>">
  <input type="hidden" name="class" value="<?php print config('csat.class') ?>">
  <input type="hidden" name="align" value="<?php print config('csat.align') ?>">
  <input type="hidden" name="top" value="<?php print config('csat.top') ?>">
  <input type="hidden" name="minutes" value="<?php print config('csat.minutes') ?>">
  <input type="hidden" name="image" value="<?php print config('csat.image') ?>">
  <input type="hidden" name="alt" value="<?php print config('csat.alt') ?>">
  <input type="hidden" name="height" value="<?php print config('csat.height') ?>">
  <input type="hidden" name="width" value="<?php print config('csat.width') ?>">
  <input type="hidden" name="bgcolor" value="<?php print config('csat.bgcolor') ?>">
  <input type="hidden" name="question" value="<?php print config('csat.question') ?>">
  <input type="hidden" name="message" value="<?php print config('csat.message') ?>">
  <input type="hidden" name="deny" value="<?php print config('csat.deny') ?>">
  <input type="hidden" name="allow" value="<?php print config('csat.allow') ?>">
  <input type="hidden" name="basepath" value="/rlc/csat">
  <input type="hidden" name="rootpath" value="">
  <input type="hidden" name="path" value="">
  <a
    href='#'
    class='sweet-csat csat-<?php print config('csat.align') ?> <?php print config('csat.class') ?>'
    style='top: <?php print config('csat.top') ?>; height: <?php print config('csat.height') ?>px; width: <?php print config('csat.width') ?>px;' 
    data-toggle="tooltip" 
    data-placement="top" 
    title="CSAT"
    ><!-- data-toggle="modal" 
    data-target="#myModal" -->
      <img
        alt='<?php print config('csat.alt') ?>'
        src='<?php print asset(config('csat.image')) ?>'
        height='<?php print config('csat.height') ?>'
        width='<?php print config('csat.width') ?>' />
  </a>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('rlc/csat/js/csat.js') }}"></script>
<?php endif;
