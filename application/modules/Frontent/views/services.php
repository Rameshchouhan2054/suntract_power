<?php
if (in_array('s1',$service_name)) {
    $title = "Project development";
} elseif (in_array('s2',$service_name)) {
    $title = "<small>EPC (Engineering Procurement & Construction)</small>";
} elseif (in_array('s3',$service_name)) {
    $title = "<small><small>Project Management, Engineering & Design Consultancy</small></small>";
} elseif (in_array('s4',$service_name)) {
    $title = "Operation and Maintenance";
}else{
    $title ="Services";
}
?>
<section class="page-banner page-breadcrumb ">
    <div class="image-layer"></div>
    <div class="auto-container">
        <h1><?php echo !empty($title) ? $title : ""; ?></h1>
    </div>
</section>
<?php
echo $service_html; 
?>

