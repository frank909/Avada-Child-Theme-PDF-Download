<?php
session_start;
$cookie_name = 'cf7msm_posted_data';
$ret = json_decode( $_COOKIE[$cookie_name], true );
//print_r($ret);

require_once( 'mpdf60/mpdf.php');
if( 'POST' === $_SERVER['REQUEST_METHOD'] ) 
{
	$pdf_html = '';	
	
	$pdf_html .= '<p><b>The purpose of this questionnaire is to gauge the actual state of compliance at your office so it goes without saying how important it is to answer the questions to the best of your knowledge.</b></p>

	<p style="margin: 0;margin-bottom: 20px;">The following are original HIPAA/NIST questions without any change or modification.</p>

	<h5 style="color:#dd3333;line-height: 18px;font-size: 17px;margin: 10px 0 0;font-weight: bold;">164.308(a)(1)(i) standard : Security Management Process</h5>
	<p style="margin: 0;margin-bottom: 20px;">1) Has your organization developed, disseminated, reviewed/updated, and trained on your risk assessment policies and procedures?
	<br>';
	
	
	if( $ret['question-one'] == 'Yes' )
	{
		$pdf_html .= '<span style="font-weight:bold;">Yes</span> No';
	} else {
		$pdf_html .= 'Yes <span style="font-weight:bold;">No</span> ';
	}
	
	$pdf_html .= '</p>';

	$pdf_html .= '<h5 style="color:#dd3333;line-height: 18px;font-size: 17px;margin: 10px 0 0;font-weight: bold;">164.308(a)(1)(ii) standard : Implementation Specifications</h5>
	<p style="margin: 0;margin-bottom: 20px;">2) Does your organization have an analysis of current safeguards and their effectiveness relative to the identified risks?
	<br>';
	
	if( $ret['question-two'] == 'Yes' )
	{
		$pdf_html .= '<span style="font-weight:bold;">Yes</span> No';
	} else {
		$pdf_html .= 'Yes <span style="font-weight:bold;">No</span> ';
	}
	
	$pdf_html .= '</p>';

	$pdf_html .= '<h5 style="color:#dd3333;line-height: 18px;font-size: 17px;margin: 10px 0 0;font-weight: bold;">164.308(a)(1)(ii)(B) standard : Risk Management</h5>
	<p style="margin: 0;margin-bottom: 20px;">3) Does your organization have a process,procedure or communication plan on how and when your managers and staff employees and workforce will be notified of suspected inappropriate activity?
	<br>';
	
	if( $ret['question-three'] == 'Yes' )
	{
		$pdf_html .= '<span style="font-weight:bold;">Yes</span> No';
	} else {
		$pdf_html .= 'Yes <span style="font-weight:bold;">No</span> ';
	}
	
	$pdf_html .= '</p>';

	$pdf_html .= '<h5 style="color:#dd3333;line-height: 18px;font-size: 17px;margin: 10px 0 0;font-weight: bold;">164.308(a)(5)(i) standard: Security Awareness and training</h5>
	<p style="margin: 0;margin-bottom: 20px;">4) Did your organizations assessment include the security training needs of sensitive data and other similar information?
	<br>';
	
	if( $ret['question-four'] == 'Yes' )
	{
		$pdf_html .= '<span style="font-weight:bold;">Yes</span> No';
	} else {
		$pdf_html .= 'Yes <span style="font-weight:bold;">No</span> ';
	}
	
	$pdf_html .= '</p>';

	$pdf_html .= '<h5 style="color:#dd3333;line-height: 18px;font-size: 17px;margin: 10px 0 0;font-weight: bold;">164.308(a)(6)(ii) standard: Implementation specification Response and reporting</h5>
	<p style="margin: 0;margin-bottom: 20px;">5) Has your organization determined how it will respond to a security incident? Are there a formal documented policies and procedures?
	<br>';
	
	if( $ret['question-five'] == 'Yes' )
	{
		$pdf_html .= '<span style="font-weight:bold;">Yes</span> No';
	} else {
		$pdf_html .= 'Yes <span style="font-weight:bold;">No</span> ';
	}
	
	$pdf_html .= '</p>';

	$pdf_html .= '<h5 style="color:#dd3333;line-height: 18px;font-size: 17px;margin: 10px 0 0;font-weight: bold;">164.308(a)(7)(i) standard: Contingency Plan</h5>
	<p style="margin: 0;margin-bottom: 20px;">6) Does your organizations contingency policy and plan address scope, resource, requirements, training, testing, plan maintenance and backup requirements?
	<br>';
	
	if( $ret['question-six'] == 'Yes' )
	{
		$pdf_html .= '<span style="font-weight:bold;">Yes</span> No';
	} else {
		$pdf_html .= 'Yes <span style="font-weight:bold;">No</span> ';
	}
	
	$pdf_html .= '</p>';

	$pdf_html .= '<h5 style="color:#dd3333;line-height: 18px;font-size: 17px;margin: 10px 0 0;font-weight: bold;">164.308(a)(7)(ii)(C) standard : Emergency mode operation plan.</h5>
	<p style="margin: 0;margin-bottom: 20px;">7) Has your organization identified key activities and developed procedures to continue key activities during an emergency?
	<br>';
	
	if( $ret['question-seven'] == 'Yes' )
	{
		$pdf_html .= '<span style="font-weight:bold;">Yes</span> No';
	} else {
		$pdf_html .= 'Yes <span style="font-weight:bold;">No</span> ';
	}
	
	$pdf_html .= '</p>';

	$pdf_html .= '<h5 style="color:#dd3333;line-height: 18px;font-size: 17px;margin: 10px 0 0;font-weight: bold;">164.308(a)(8) standard: Evaluation</h5>
	<p style="margin: 0;margin-bottom: 20px;">8) Has your organization established a frequency for security evaluations, and disseminated this information to your entire organization?
	<br>';
	
	if( $ret['question-eight'] == 'Yes' )
	{
		$pdf_html .= '<span style="font-weight:bold;">Yes</span> No';
	} else {
		$pdf_html .= 'Yes <span style="font-weight:bold;">No</span> ';
	}
	
	$pdf_html .= '</p>';

	$pdf_html .= '<h5 style="color:#dd3333;line-height: 18px;font-size: 17px;margin: 10px 0 0;font-weight: bold;">164.308(b)(1) standard : Business associate contracts and other arrangements</h5>
	<p style="margin: 0;margin-bottom: 20px;">9) Does your organizations business associate contracts contain sufficient language to ensure that required information types are protected? including the 2009, 2010 and 2011 HITECH Act updates and inclusions?
	<br>';
	
	if( $ret['question-nine'] == 'Yes' )
	{
		$pdf_html .= '<span style="font-weight:bold;">Yes</span> No';
	} else {
		$pdf_html .= 'Yes <span style="font-weight:bold;">No</span> ';
	}
	
	$pdf_html .= '</p>';

	$pdf_html .= '<h5 style="color:#dd3333;line-height: 18px;font-size: 17px;margin: 10px 0 0;font-weight: bold;">164.310(B)standard : Workstation Use</h5>
	<p style="margin: 0;margin-bottom: 20px;">10) Has your organization identified key operational risks that could result in a breach of security from all types of workstations, and trained your staff, employees and workforce members on predictable breaches?
	<br>';
	
	if( $ret['question-ten'] == 'Yes' )
	{
		$pdf_html .= '<span style="font-weight:bold;">Yes</span> No';
	} else {
		$pdf_html .= 'Yes <span style="font-weight:bold;">No</span> ';
	}
	
	$pdf_html .= '</p>';


	$mpdf=new mPDF();
	$mpdf->WriteHTML($pdf_html);
	$mpdf->Output('Center_for_HIPAA.pdf','D');
}
echo $pdf_html;
?>