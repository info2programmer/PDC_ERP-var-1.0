<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $head; ?>
</head>
<body>
<?php echo $header; ?>
<section id="homebody1">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-12"> <?php echo $left_sidebar; ?> </div>
      <!-- left menu area ends here ------------------------------->
      <div class="col-md-9 col-sm-12">
        <?php echo $maincontent; ?>
      </div>
      <!-- right content area ends here ------------------------------->
    </div>
  </div>
</section>
<!-- homebody ends here ----------------------------------------------------------------------------------------------->
<?php echo $footer; ?>
<script>
// Determines button clicked via id
function myFunction(id) {
  document.calc.result.value+=id;
}

// Clears calculator input screen
function clearScreen() {
  document.calc.result.value="";
}

// Calculates input values
function calculate() {
  try {
    var input = eval(document.calc.result.value);
    document.calc.result.value=input;
  } catch(err){
      document.calc.result.value="Error";
    }
}
</script>
</body>
</html>
