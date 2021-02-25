<?php
/*This file is part of form, generatepress child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet
(leave it in place unless you know what you are doing.)
*/

if ( ! function_exists( 'suffice_child_enqueue_child_styles' ) ) {
	function form_enqueue_child_styles() {
	    // loading parent style
	    wp_register_style(
	      'parente2-style',
	      get_template_directory_uri() . '/style.css'
	    );

	    wp_enqueue_style( 'parente2-style' );
	    // loading child style
	    wp_register_style(
	      'childe2-style',
	      get_stylesheet_directory_uri() . '/style.css'
	    );
	    wp_enqueue_style( 'childe2-style');
	 }
}
add_action( 'wp_enqueue_scripts', 'form_enqueue_child_styles' );

/*Write here your own functions */

//hide admin bar in wordpress frontend
add_filter('show_admin_bar', '__return_false');

//add custom logo
function my_custom_login_logo() {
    echo '<style type="text/css">
    h1 a {background-image:url(http://example.com/your-logo.png) !important; margin:0 auto;}
    </style>';
}
add_filter( 'login_head', 'my_custom_login_logo' );

// Enable shortcodes in cf7

add_filter( 'wpcf7_form_elements', 'delicious_wpcf7_form_elements' );
 
function delicious_wpcf7_form_elements( $form ) {
$form = do_shortcode( $form );
return $form;
}

// The following code will create a .mod file after each form submission, using $POST data from CF7 built-in system. 

add_action( 'wpcf7_before_send_mail', 'CF7_pre_send' );
 
function CF7_pre_send($cf7) {

$cliente = $_POST['cliente'];

if(strlen($cliente) == 1){
$cliente1 = '         '.$cliente;
}
elseif(strlen($cliente) == 2){
$cliente1 = '        '.$cliente;
}
elseif(strlen($cliente) == 3){
$cliente1 = '       '.$cliente;
}
elseif(strlen($cliente) == 4){
$cliente1 = '      '.$cliente;
}
elseif(strlen($cliente) == 5){
$cliente1 = '     '.$cliente;
}
elseif(strlen($cliente) == 6){
$cliente1 = '    '.$cliente;
}
elseif(strlen($cliente) == 7){
$cliente1 = '   '.$cliente;
}
elseif(strlen($cliente) == 8){
$cliente1 = '  '.$cliente;
}
elseif(strlen($cliente) == 9){
$cliente1 = ' '.$cliente;
}
elseif(strlen($cliente) == 10){
$cliente1 = $cliente;
}

$vendedor = $_POST['vendedor'];

if(strlen($vendedor) == 1){
$vendedor1 = '    '.$vendedor;
}
elseif(strlen($vendedor) == 2){
$vendedor1 = '   '.$vendedor;
}
elseif(strlen($vendedor) == 3){
$vendedor1 = '  '.$vendedor;
}
elseif(strlen($vendedor) == 4){
$vendedor1 = ' '.$vendedor;
}
elseif(strlen($vendedor) == 5){
$vendedor1 = $vendedor;
}
	
    $output = '<?xml version="1.0" standalone="yes"?>  
    <DATAPACKET Version="2.0">
    <METADATA>
    <FIELDS>
    <FIELD attrname="CVE_CLPV" fieldtype="string" WIDTH="10"/>
    <FIELD attrname="NUM_ALMA" fieldtype="i4"/>
    <FIELD attrname="CVE_PEDI" fieldtype="string" WIDTH="20"/>
    <FIELD attrname="ESQUEMA" fieldtype="i4"/>
    <FIELD attrname="DES_TOT" fieldtype="r8"/>
    <FIELD attrname="DES_FIN" fieldtype="r8"/>
    <FIELD attrname="CVE_VEND" fieldtype="string" WIDTH="5"/>
    <FIELD attrname="COM_TOT" fieldtype="r8"/>
    <FIELD attrname="NUM_MONED" fieldtype="i4"/>
    <FIELD attrname="TIPCAMB" fieldtype="r8"/>
    <FIELD attrname="STR_OBS" fieldtype="string" WIDTH="255"/>
    <FIELD attrname="ENTREGA" fieldtype="string" WIDTH="25"/>
    <FIELD attrname="SU_REFER" fieldtype="string" WIDTH="20"/>
    <FIELD attrname="TOT_IND" fieldtype="r8"/>
    <FIELD attrname="MODULO" fieldtype="string" WIDTH="4"/>
    <FIELD attrname="CONDICION" fieldtype="string" WIDTH="25"/>
    <FIELD attrname="dtfield" fieldtype="nested">
    <FIELDS>
    <FIELD attrname="CANT" fieldtype="r8"/>
    <FIELD attrname="CVE_ART" fieldtype="string" WIDTH="20"/>
    <FIELD attrname="DESC1" fieldtype="r8"/>
    <FIELD attrname="DESC2" fieldtype="r8"/>
    <FIELD attrname="DESC3" fieldtype="r8"/>
    <FIELD attrname="IMPU1" fieldtype="r8"/>
    <FIELD attrname="IMPU2" fieldtype="r8"/>
    <FIELD attrname="IMPU3" fieldtype="r8"/>
    <FIELD attrname="IMPU4" fieldtype="r8"/>
    <FIELD attrname="COMI" fieldtype="r8"/>
    <FIELD attrname="PREC" fieldtype="r8"/>
    <FIELD attrname="NUM_ALM" fieldtype="i4"/>
    <FIELD attrname="STR_OBS" fieldtype="string" WIDTH="255"/>
    <FIELD attrname="REG_GPOPROD" fieldtype="i4"/>
    <FIELD attrname="REG_KITPROD" fieldtype="i4"/>
    <FIELD attrname="NUM_REG" fieldtype="i4"/>
    <FIELD attrname="COSTO" fieldtype="r8"/>
    <FIELD attrname="TIPO_PROD" fieldtype="string" WIDTH="1"/>
    <FIELD attrname="TIPO_ELEM" fieldtype="string" WIDTH="1"/>
    <FIELD attrname="MINDIRECTO" fieldtype="r8"/>
    <FIELD attrname="TIP_CAM" fieldtype="r8"/>
    <FIELD attrname="FACT_CONV" fieldtype="r8"/>
    <FIELD attrname="UNI_VENTA" fieldtype="string" WIDTH="10"/>
    <FIELD attrname="IMP1APLA" fieldtype="i4"/>
    <FIELD attrname="IMP2APLA" fieldtype="i4"/>
    <FIELD attrname="IMP3APLA" fieldtype="i4"/>
    <FIELD attrname="IMP4APLA" fieldtype="i4"/>
    <FIELD attrname="PREC_SINREDO" fieldtype="r8"/>
    <FIELD attrname="COST_SINREDO" fieldtype="r8"/>
    <FIELD attrname="LOTE" fieldtype="string" WIDTH="16"/>
    <FIELD attrname="PEDIMENTO" fieldtype="string" WIDTH="16"/>
    <FIELD attrname="FECHCADUC" fieldtype="dateTime"/>
    <FIELD attrname="FECHADUANA" fieldtype="dateTime"/>
    </FIELDS>
    <PARAMS/>
    </FIELD>
    </FIELDS>
    <PARAMS/>
    </METADATA>
    <ROWDATA>
    <ROW CVE_CLPV="'.$cliente1.'" NUM_ALMA="1" CVE_PEDI="'.$_POST['orden'].'" ESQUEMA="1" DES_TOT="0" DES_FIN="0" CVE_VEND="'.$vendedor1.'" COM_TOT="0" NUM_MONED="1" TIPCAMB="1" STR_OBS="'.$_POST['obspedido'].'" MODULO="FACT" CONDICION="">
    <dtfield>
    <ROWdtfield CANT="'.$_POST['cantidad__1'].'" CVE_ART="'.$_POST['clave__1'].'" DESC1="'.$_POST['descuento__1'].'" DESC2="0" DESC3="0" IMPU1="0" IMPU2="0" IMPU3="0" IMPU4="16" COMI="0" PREC="" NUM_ALM="1" STR_OBS="'.$_POST['observaciones__1'].'" REG_GPOPROD="0" COSTO="" TIPO_PROD="" TIPO_ELEM="N" TIP_CAM="1" UNI_VENTA="" IMP1APLA="6" IMP2APLA="6" IMP3APLA="6" IMP4APLA="0" PREC_SINREDO="" COST_SINREDO=""/>
    <ROWdtfield CANT="'.$_POST['cantidad__2'].'" CVE_ART="'.$_POST['clave__2'].'" DESC1="'.$_POST['descuento__2'].'" DESC2="0" DESC3="0" IMPU1="0" IMPU2="0" IMPU3="0" IMPU4="16" COMI="0" PREC="" NUM_ALM="1" STR_OBS="'.$_POST['observaciones__2'].'" REG_GPOPROD="0" COSTO="" TIPO_PROD="" TIPO_ELEM="N" TIP_CAM="1" UNI_VENTA="" IMP1APLA="6" IMP2APLA="6" IMP3APLA="6" IMP4APLA="0" PREC_SINREDO="" COST_SINREDO=""/>
    <ROWdtfield CANT="'.$_POST['cantidad__3'].'" CVE_ART="'.$_POST['clave__3'].'" DESC1="'.$_POST['descuento__3'].'" DESC2="0" DESC3="0" IMPU1="0" IMPU2="0" IMPU3="0" IMPU4="16" COMI="0" PREC="" NUM_ALM="1" STR_OBS="'.$_POST['observaciones__3'].'" REG_GPOPROD="0" COSTO="" TIPO_PROD="" TIPO_ELEM="N" TIP_CAM="1" UNI_VENTA="" IMP1APLA="6" IMP2APLA="6" IMP3APLA="6" IMP4APLA="0" PREC_SINREDO="" COST_SINREDO=""/>
    <ROWdtfield CANT="'.$_POST['cantidad__4'].'" CVE_ART="'.$_POST['clave__4'].'" DESC1="'.$_POST['descuento__4'].'" DESC2="0" DESC3="0" IMPU1="0" IMPU2="0" IMPU3="0" IMPU4="16" COMI="0" PREC="" NUM_ALM="1" STR_OBS="'.$_POST['observaciones__4'].'" REG_GPOPROD="0" COSTO="" TIPO_PROD="" TIPO_ELEM="N" TIP_CAM="1" UNI_VENTA="" IMP1APLA="6" IMP2APLA="6" IMP3APLA="6" IMP4APLA="0" PREC_SINREDO="" COST_SINREDO=""/>
	  <ROWdtfield CANT="'.$_POST['cantidad__5'].'" CVE_ART="'.$_POST['clave__5'].'" DESC1="'.$_POST['descuento__5'].'" DESC2="0" DESC3="0" IMPU1="0" IMPU2="0" IMPU3="0" IMPU4="16" COMI="0" PREC="" NUM_ALM="1" STR_OBS="'.$_POST['observaciones__5'].'" REG_GPOPROD="0" COSTO="" TIPO_PROD="" TIPO_ELEM="N" TIP_CAM="1" UNI_VENTA="" IMP1APLA="6" IMP2APLA="6" IMP3APLA="6" IMP4APLA="0" PREC_SINREDO="" COST_SINREDO=""/>
    <ROWdtfield CANT="'.$_POST['cantidad__6'].'" CVE_ART="'.$_POST['clave__6'].'" DESC1="'.$_POST['descuento__6'].'" DESC2="0" DESC3="0" IMPU1="0" IMPU2="0" IMPU3="0" IMPU4="16" COMI="0" PREC="" NUM_ALM="1" STR_OBS="'.$_POST['observaciones__6'].'" REG_GPOPROD="0" COSTO="" TIPO_PROD="" TIPO_ELEM="N" TIP_CAM="1" UNI_VENTA="" IMP1APLA="6" IMP2APLA="6" IMP3APLA="6" IMP4APLA="0" PREC_SINREDO="" COST_SINREDO=""/>
    <ROWdtfield CANT="'.$_POST['cantidad__7'].'" CVE_ART="'.$_POST['clave__7'].'" DESC1="'.$_POST['descuento__7'].'" DESC2="0" DESC3="0" IMPU1="0" IMPU2="0" IMPU3="0" IMPU4="16" COMI="0" PREC="" NUM_ALM="1" STR_OBS="'.$_POST['observaciones__7'].'" REG_GPOPROD="0" COSTO="" TIPO_PROD="" TIPO_ELEM="N" TIP_CAM="1" UNI_VENTA="" IMP1APLA="6" IMP2APLA="6" IMP3APLA="6" IMP4APLA="0" PREC_SINREDO="" COST_SINREDO=""/>
    <ROWdtfield CANT="'.$_POST['cantidad__8'].'" CVE_ART="'.$_POST['clave__8'].'" DESC1="0" DESC2="0" DESC3="0" IMPU1="0" IMPU2="0" IMPU3="0" IMPU4="16" COMI="0" PREC="" NUM_ALM="1" STR_OBS="'.$_POST['observaciones__8'].'" REG_GPOPROD="0" COSTO="" TIPO_PROD="" TIPO_ELEM="N" TIP_CAM="1" UNI_VENTA="" IMP1APLA="6" IMP2APLA="6" IMP3APLA="6" IMP4APLA="0" PREC_SINREDO="" COST_SINREDO=""/>
    <ROWdtfield CANT="'.$_POST['cantidad__9'].'" CVE_ART="'.$_POST['clave__9'].'" DESC1="0" DESC2="0" DESC3="0" IMPU1="0" IMPU2="0" IMPU3="0" IMPU4="16" COMI="0" PREC="" NUM_ALM="1" STR_OBS="'.$_POST['observaciones__9'].'" REG_GPOPROD="0" COSTO="" TIPO_PROD="" TIPO_ELEM="N" TIP_CAM="1" UNI_VENTA="" IMP1APLA="6" IMP2APLA="6" IMP3APLA="6" IMP4APLA="0" PREC_SINREDO="" COST_SINREDO=""/>
    <ROWdtfield CANT="'.$_POST['cantidad__10'].'" CVE_ART="'.$_POST['clave__10'].'" DESC1="0" DESC2="0" DESC3="0" IMPU1="0" IMPU2="0" IMPU3="0" IMPU4="16" COMI="0" PREC="" NUM_ALM="1" STR_OBS="'.$_POST['observaciones__10'].'" REG_GPOPROD="0" COSTO="" TIPO_PROD="" TIPO_ELEM="N" TIP_CAM="1" UNI_VENTA="" IMP1APLA="6" IMP2APLA="6" IMP3APLA="6" IMP4APLA="0" PREC_SINREDO="" COST_SINREDO=""/>
    <ROWdtfield CANT="'.$_POST['cantidad__11'].'" CVE_ART="'.$_POST['clave__11'].'" DESC1="0" DESC2="0" DESC3="0" IMPU1="0" IMPU2="0" IMPU3="0" IMPU4="16" COMI="0" PREC="" NUM_ALM="1" STR_OBS="'.$_POST['observaciones__11'].'" REG_GPOPROD="0" COSTO="" TIPO_PROD="" TIPO_ELEM="N" TIP_CAM="1" UNI_VENTA="" IMP1APLA="6" IMP2APLA="6" IMP3APLA="6" IMP4APLA="0" PREC_SINREDO="" COST_SINREDO=""/>
    <ROWdtfield CANT="'.$_POST['cantidad__12'].'" CVE_ART="'.$_POST['clave__12'].'" DESC1="0" DESC2="0" DESC3="0" IMPU1="0" IMPU2="0" IMPU3="0" IMPU4="16" COMI="" PREC="" NUM_ALM="1" STR_OBS="'.$_POST['observaciones__12'].'" REG_GPOPROD="0" COSTO="" TIPO_PROD="" TIPO_ELEM="N" TIP_CAM="1" UNI_VENTA="" IMP1APLA="6" IMP2APLA="6" IMP3APLA="6" IMP4APLA="0" PREC_SINREDO="" COST_SINREDO=""/>
    <ROWdtfield CANT="'.$_POST['cantidad__13'].'" CVE_ART="'.$_POST['clave__13'].'" DESC1="0" DESC2="0" DESC3="0" IMPU1="0" IMPU2="0" IMPU3="0" IMPU4="16" COMI="" PREC="" NUM_ALM="1" STR_OBS="'.$_POST['observaciones__13'].'" REG_GPOPROD="0" COSTO="" TIPO_PROD="" TIPO_ELEM="N" TIP_CAM="1" UNI_VENTA="" IMP1APLA="6" IMP2APLA="6" IMP3APLA="6" IMP4APLA="0" PREC_SINREDO="" COST_SINREDO=""/>
    <ROWdtfield CANT="'.$_POST['cantidad__14'].'" CVE_ART="'.$_POST['clave__14'].'" DESC1="0" DESC2="0" DESC3="0" IMPU1="0" IMPU2="0" IMPU3="0" IMPU4="16" COMI="" PREC="" NUM_ALM="1" STR_OBS="'.$_POST['observaciones__14'].'" REG_GPOPROD="0" COSTO="" TIPO_PROD="" TIPO_ELEM="N" TIP_CAM="1" UNI_VENTA="" IMP1APLA="6" IMP2APLA="6" IMP3APLA="6" IMP4APLA="0" PREC_SINREDO="" COST_SINREDO=""/>
    <ROWdtfield CANT="'.$_POST['cantidad__15'].'" CVE_ART="'.$_POST['clave__15'].'" DESC1="0" DESC2="0" DESC3="0" IMPU1="0" IMPU2="0" IMPU3="0" IMPU4="16" COMI="" PREC="" NUM_ALM="1" STR_OBS="'.$_POST['observaciones__15'].'" REG_GPOPROD="0" COSTO="" TIPO_PROD="" TIPO_ELEM="N" TIP_CAM="1" UNI_VENTA="" IMP1APLA="6" IMP2APLA="6" IMP3APLA="6" IMP4APLA="0" PREC_SINREDO="" COST_SINREDO=""/>
    <ROWdtfield CANT="'.$_POST['cantidad__16'].'" CVE_ART="'.$_POST['clave__16'].'" DESC1="0" DESC2="0" DESC3="0" IMPU1="0" IMPU2="0" IMPU3="0" IMPU4="16" COMI="" PREC="" NUM_ALM="1" STR_OBS="'.$_POST['observaciones__16'].'" REG_GPOPROD="0" COSTO="" TIPO_PROD="" TIPO_ELEM="N" TIP_CAM="1" UNI_VENTA="" IMP1APLA="6" IMP2APLA="6" IMP3APLA="6" IMP4APLA="0" PREC_SINREDO="" COST_SINREDO=""/>
    <ROWdtfield CANT="'.$_POST['cantidad__17'].'" CVE_ART="'.$_POST['clave__17'].'" DESC1="0" DESC2="0" DESC3="0" IMPU1="0" IMPU2="0" IMPU3="0" IMPU4="16" COMI="" PREC="" NUM_ALM="1" STR_OBS="'.$_POST['observaciones__17'].'" REG_GPOPROD="0" COSTO="" TIPO_PROD="" TIPO_ELEM="N" TIP_CAM="1" UNI_VENTA="" IMP1APLA="6" IMP2APLA="6" IMP3APLA="6" IMP4APLA="0" PREC_SINREDO="" COST_SINREDO=""/>
    <ROWdtfield CANT="'.$_POST['cantidad__18'].'" CVE_ART="'.$_POST['clave__18'].'" DESC1="0" DESC2="0" DESC3="0" IMPU1="0" IMPU2="0" IMPU3="0" IMPU4="16" COMI="" PREC="" NUM_ALM="1" STR_OBS="'.$_POST['observaciones__18'].'" REG_GPOPROD="0" COSTO="" TIPO_PROD="" TIPO_ELEM="N" TIP_CAM="1" UNI_VENTA="" IMP1APLA="6" IMP2APLA="6" IMP3APLA="6" IMP4APLA="0" PREC_SINREDO="" COST_SINREDO=""/>
    <ROWdtfield CANT="'.$_POST['cantidad__19'].'" CVE_ART="'.$_POST['clave__19'].'" DESC1="0" DESC2="0" DESC3="0" IMPU1="0" IMPU2="0" IMPU3="0" IMPU4="16" COMI="" PREC="" NUM_ALM="1" STR_OBS="'.$_POST['observaciones__19'].'" REG_GPOPROD="0" COSTO="" TIPO_PROD="" TIPO_ELEM="N" TIP_CAM="1" UNI_VENTA="" IMP1APLA="6" IMP2APLA="6" IMP3APLA="6" IMP4APLA="0" PREC_SINREDO="" COST_SINREDO=""/>
    <ROWdtfield CANT="'.$_POST['cantidad__20'].'" CVE_ART="'.$_POST['clave__20'].'" DESC1="0" DESC2="0" DESC3="0" IMPU1="0" IMPU2="0" IMPU3="0" IMPU4="16" COMI="" PREC="" NUM_ALM="1" STR_OBS="'.$_POST['observaciones__20'].'" REG_GPOPROD="0" COSTO="" TIPO_PROD="" TIPO_ELEM="N" TIP_CAM="1" UNI_VENTA="" IMP1APLA="6" IMP2APLA="6" IMP3APLA="6" IMP4APLA="0" PREC_SINREDO="" COST_SINREDO=""/>
    <ROWdtfield CANT="'.$_POST['cantidad__21'].'" CVE_ART="'.$_POST['clave__21'].'" DESC1="0" DESC2="0" DESC3="0" IMPU1="0" IMPU2="0" IMPU3="0" IMPU4="16" COMI="" PREC="" NUM_ALM="1" STR_OBS="'.$_POST['observaciones__21'].'" REG_GPOPROD="0" COSTO="" TIPO_PROD="" TIPO_ELEM="N" TIP_CAM="1" UNI_VENTA="" IMP1APLA="6" IMP2APLA="6" IMP3APLA="6" IMP4APLA="0" PREC_SINREDO="" COST_SINREDO=""/>
    <ROWdtfield CANT="'.$_POST['cantidad__22'].'" CVE_ART="'.$_POST['clave__22'].'" DESC1="0" DESC2="0" DESC3="0" IMPU1="0" IMPU2="0" IMPU3="0" IMPU4="16" COMI="" PREC="" NUM_ALM="1" STR_OBS="'.$_POST['observaciones__22'].'" REG_GPOPROD="0" COSTO="" TIPO_PROD="" TIPO_ELEM="N" TIP_CAM="1" UNI_VENTA="" IMP1APLA="6" IMP2APLA="6" IMP3APLA="6" IMP4APLA="0" PREC_SINREDO="" COST_SINREDO=""/>
    <ROWdtfield CANT="'.$_POST['cantidad__23'].'" CVE_ART="'.$_POST['clave__23'].'" DESC1="0" DESC2="0" DESC3="0" IMPU1="0" IMPU2="0" IMPU3="0" IMPU4="16" COMI="" PREC="" NUM_ALM="1" STR_OBS="'.$_POST['observaciones__23'].'" REG_GPOPROD="0" COSTO="" TIPO_PROD="" TIPO_ELEM="N" TIP_CAM="1" UNI_VENTA="" IMP1APLA="6" IMP2APLA="6" IMP3APLA="6" IMP4APLA="0" PREC_SINREDO="" COST_SINREDO=""/>
    <ROWdtfield CANT="'.$_POST['cantidad__24'].'" CVE_ART="'.$_POST['clave__24'].'" DESC1="0" DESC2="0" DESC3="0" IMPU1="0" IMPU2="0" IMPU3="0" IMPU4="16" COMI="" PREC="" NUM_ALM="1" STR_OBS="'.$_POST['observaciones__24'].'" REG_GPOPROD="0" COSTO="" TIPO_PROD="" TIPO_ELEM="N" TIP_CAM="1" UNI_VENTA="" IMP1APLA="6" IMP2APLA="6" IMP3APLA="6" IMP4APLA="0" PREC_SINREDO="" COST_SINREDO=""/>
    <ROWdtfield CANT="'.$_POST['cantidad__25'].'" CVE_ART="'.$_POST['clave__25'].'" DESC1="0" DESC2="0" DESC3="0" IMPU1="0" IMPU2="0" IMPU3="0" IMPU4="16" COMI="" PREC="" NUM_ALM="1" STR_OBS="'.$_POST['observaciones__25'].'" REG_GPOPROD="0" COSTO="" TIPO_PROD="" TIPO_ELEM="N" TIP_CAM="1" UNI_VENTA="" IMP1APLA="6" IMP2APLA="6" IMP3APLA="6" IMP4APLA="0" PREC_SINREDO="" COST_SINREDO=""/>
    </dtfield>
    </ROW>
    </ROWDATA>
    </DATAPACKET>';
    
	// get the dropdown value here and then put an sequential number with it
	$dropdown_val = $_POST['Empresa'];
    $clave = $_POST['vendedor'];
	$incremented_val = get_option('file_number');
	update_option( 'file_number', $incremented_val + 1 );
	$new_file_name = $clave.$dropdown_val.get_option( 'file_number' );
	$_POST["archivo"] = $new_file_name;

	file_put_contents("../pedidos/$new_file_name.mod", $output);
}
