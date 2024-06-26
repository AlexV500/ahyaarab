<?php
header("Content-Type:text/css");
$color = "#f0f"; // Change your Color Here

function checkhexcolor($color) {
    return preg_match('/^#[a-f0-9]{6}$/i', $color);
}

if (isset($_GET['color']) AND $_GET['color'] != '') {
    $color = "#" . $_GET['color'];
}

if (!$color OR !checkhexcolor($color)) {
    $color = "#336699";
}

?>

.header .main-menu li a:hover, .header .main-menu li a:focus, .hero__title, .stat-card__icon i, .header .nav-right a, .choose-card__icon,.header .main-menu li.menu_has_children:hover>a::before {
color: <?php echo $color ?>;
}

.header .main-menu li .sub-menu {
    border-color: <?php echo $color ?>;
}

.header .main-menu li .sub-menu {
    box-shadow: 0 3px 5px <?php echo $color ?>;
}

.nice-select .option:hover, .nice-select .option.focus, .nice-select .option.selected.focus, .cmn-accordion .card-header .acc-btn, .single-select.active::after,.cookies-card__icon,.copied::after {
background-color: <?php echo $color ?>;
}

.cmn-btn, .table.style--two thead {
background-color: <?php echo $color ?>;
}
.cmn-btn:hover {
background-color: <?php echo $color ?>;
box-shadow: 0 0 10px 2px <?php echo $color ?>8c;
}
.cmn-btn-two {
    border: 1px solid <?php echo $color ?>;
}
.cmn-btn-two:hover {
box-shadow: 0px 0px 10px 2px <?php echo $color ?>bf, inset 0px 0px 10px 2px <?php echo $color ?>bf;
}
a:hover, .feature-card__icon, .text--base {
color: <?php echo $color ?>;
}
.choose-card:hover {
    border-color: <?php echo $color ?>;
    box-shadow: 0 3px 10px <?php echo $color ?>88;
}

.testimonial-slider .slick-arrow,
.work-card__icon  .step-number {
background-color: <?php echo $color ?>;
}

.testimonial-card__content,
.testimonial-card__content::before {
    border-color: <?php echo $color ?>;
}

.post-card__content .date, .work-card__icon i {
color: <?php echo $color ?>;
}

.footer-widget .subscribe-form .subscribe-btn {
background-color: <?php echo $color ?>;
}

.info-single__content a:hover {
color: <?php echo $color ?>;
}

.winner-item:hover {
    border-color: <?php echo $color ?>;
    box-shadow: 0 0 3px <?php echo $color ?>60;
}

.scroll-to-top, .post-card__thumb .post-card__date,.table thead tr th {
    background-color: <?php echo $color ?>;
}


.base--color, .small-post__content .date {
color: <?php echo $color ?>;
}

.page-list li a {
color: <?php echo $color ?>;
}

.pagination .page-item .page-link::after, .modal-header {
background-color: <?php echo $color ?>;
}

.input-group-text {
    background-color: <?php echo $color ?>;
    border-color: <?php echo $color ?>;
}

.contact-item i {
color: <?php echo $color ?>;
}

.contact-item a:hover {
color: <?php echo $color ?>;
}

.account-wrapper .input-group-text {
background-color: <?php echo $color ?>;
}

.amount-field ~ .input-group-append .input-group-text {
background-color: <?php echo $color ?>;
border: 1px solid <?php echo $color ?>;
}

.base--bg {
background-color: <?php echo $color ?>;
}


.custom--table .thead-dark th:last-child {
border-right: 1px solid <?php echo $color ?>;
}

.custom--file-upload ~ label {
background-color: <?php echo $color ?>;
}

*::-webkit-scrollbar-thumb {
background: <?php echo $color ?> !important;
}

.page-item.active .page-link {
    color: <?php echo $color ?> !important;
}

.profile-thumb .avatar-edit label {
background-color: <?php echo $color ?> !important;
color: #fff !important;
}

.statistics-section {
    border-top: 1px solid <?php echo $color ?>;
    border-bottom: 1px solid <?php echo $color ?>;
}

.shape-1,
.shape-2,
.shape-1::before,
.shape-2::before,.login-area .input-group-text,.registration-area .input-group-text,.contact-item:hover {
    background-color: <?php echo $color ?> !important;
}

.preloader__thumb::after{
    border: 2px solid <?php echo $color ?>;
}
.form-control:focus{
    box-shadow: 0px 0px 4px <?php echo $color ?> ;
    border: 0.5px solid <?php echo $color ?> ;
}

.d-widget-balance .d-widget-icon {
    background-color: <?php echo $color ?>;
    box-shadow: 0 0 5px <?php echo $color ?>;
}
.verification-code span{
    border: solid 1px  <?php echo $color ?> !important;
    color:  <?php echo $color ?> !important;
}

.winner-item::after{
    border: 2px solid <?php echo $color ?> !important;
    box-shadow:  0 0 5px 2px <?php echo $color ?> 73!important;
}
.winner-item::before{
    background-color: <?php echo $color ?>26 !important;
}
.cursor-pointer:hover {
    background: <?php echo $color ?> !important;
}
.payment-item__check{
    border:1px solid <?php echo $color ?> !important;
}
.payment-item:has(.payment-item__radio:checked) .payment-item__check{
    border: 3px solid <?php echo $color ?> !important;
}

.select2-container--default .select2-search--dropdown .select2-search__field:focus{
    border-color: <?php echo $color ?> !important;
}