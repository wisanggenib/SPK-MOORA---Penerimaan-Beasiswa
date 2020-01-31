<?php 


require __DIR__.'/vendor/autoload.php';

    use Spipu\Html2Pdf\Html2Pdf;

// Create new PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetFont("helvetica", '', 10);
 
$pdf->AddPage();

// Important: this will prevent the generation of the PDF in the browser
// as we are filling the output buffer of PHP
var_dump(array(
    "test" => "demo"
));
 
// create some HTML content
$html = '<h1>HTML Example</h1>
<h2>List</h2>
List example:
<ol>
    <li><b>bold text</b></li>
    <li><i>italic text</i></li>
    <li><u>underlined text</u></li>
    <li><b>b<i>bi<u>biu</u>bi</i>b</b></li>
    <li><a href="http://www.tecnick.com" dir="ltr">link to http://www.tecnick.com</a></li>
    <li>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.<br />Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</li>
    <li>SUBLIST
        <ol>
            <li>row one
                <ul>
                    <li>sublist</li>
                </ul>
            </li>
            <li>row two</li>
        </ol>
    </li>
    <li><b>T</b>E<i>S</i><u>T</u> <del>line through</del></li>
    <li><font size="+3">font + 3</font></li>
    <li><small>small text</small> normal <small>small text</small> normal <sub>subscript</sub> normal <sup>superscript</sup> normal</li>
</ol>
</div>';

// Output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');
 
$pdf->lastPage();
ob_end_clean();

// Send the PDF !
$pdf->Output('example_006.pdf', 'I');

    

?>