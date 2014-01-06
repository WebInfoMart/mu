<?php
session_start();
//echo "<pre>";print_r($_GET);exit;

//echo $img;
require('fpdf/fpdf.php');
class PDF extends FPDF
{
	function Header()
	{
		global $title;

		$this->Image('http://meetuniv.com/assets/pdfImages/logo.png',8,5,40);
		//$this->Image('http://meetuniv.com/assets/new_logo.png',10,6,50);
		$this->Image('http://meetuniv.com/assets/pdfImages/gifted.png',172,5,30);
		// Arial bold 15
	  // Logo
		$this->SetFont('Arial','B',15);
		// Move to the right
		$this->Cell(80);
		// Title
		//$this->Cell(65,10,'THE CAREER BATTERY',1,0,'C');
		// Line break
		$this->Ln(10);
	}

	function Footer()
	{
		// Position at 1.5 cm from bottom
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Text color in gray
		$this->SetTextColor(128);
		// Page number
		$this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
	}

	function ChapterTitle($num, $label)
	{
		// Arial 12
		$this->SetFont('Arial','',12);
		// Background color
		$this->SetFillColor(20,22,25);
		// Title
		$this->Cell(0,6,"Chapter $num : $label",0,1,'L',true);
		// Line break
		$this->Ln(4);
	}

	function ChapterBody($file)
	{
		// Read text file
		$txt = file_get_contents($file);
		// Times 12
		$this->SetFont('Times','',8);
		// Output justified text
		$this->MultiCell(0,5,$txt);
		// Line break
		$this->Ln();
		// Mention in italics
		//$this->SetFont('','I');
		
		
		
		//images 
		if($_GET['value'] == '1'){
			$this->Image('http://meetuniv.com/assets/pdfImages/1highlighted.jpg',15,70,90);
			$this->Image('http://meetuniv.com/assets/pdfImages/2.jpg',105,70,90);
			$this->Image('http://meetuniv.com/assets/pdfImages/3.jpg',15,117,90);
			$this->Image('http://meetuniv.com/assets/pdfImages/4.jpg',105,117,90);
		}else if($_GET['value'] == '2'){
			$this->Image('http://meetuniv.com/assets/pdfImages/1.jpg',15,70,90);
			$this->Image('http://meetuniv.com/assets/pdfImages/2highlighted.jpg',105,70,90);
			$this->Image('http://meetuniv.com/assets/pdfImages/3.jpg',15,117,90);
			$this->Image('http://meetuniv.com/assets/pdfImages/4.jpg',105,117,90);
		}else if($_GET['value'] == '3'){
			$this->Image('http://meetuniv.com/assets/pdfImages/1.jpg',15,70,90);
			$this->Image('http://meetuniv.com/assets/pdfImages/2.jpg',105,70,90);
			$this->Image('http://meetuniv.com/assets/pdfImages/3highlighted.jpg',15,117,90);
			$this->Image('http://meetuniv.com/assets/pdfImages/4.jpg',105,117,90);
		}else if($_GET['value'] == '4'){
			$this->Image('http://meetuniv.com/assets/pdfImages/1.jpg',15,70,90);
			$this->Image('http://meetuniv.com/assets/pdfImages/2.jpg',105,70,90);
			$this->Image('http://meetuniv.com/assets/pdfImages/3.jpg',15,117,90);
			$this->Image('http://meetuniv.com/assets/pdfImages/4highlighted.jpg',105,117,90);
		}else{
			$this->Image('http://meetuniv.com/assets/pdfImages/1.jpg',15,70,90);
			$this->Image('http://meetuniv.com/assets/pdfImages/2.jpg',105,70,90);
			$this->Image('http://meetuniv.com/assets/pdfImages/3.jpg',15,117,90);
			$this->Image('http://meetuniv.com/assets/pdfImages/4.jpg',105,117,90);
		}
		
		
		if($_GET['maxtext1'] == 'Influncing Other'){
			$this->Image('http://meetuniv.com/assets/pdfImages/influs.png',18,190,30);
		}else if($_GET['maxtext1'] == 'Application of Technology'){
			$this->Image('http://meetuniv.com/assets/pdfImages/application.png',18,190,30);
		}else if($_GET['maxtext1'] == 'Controlling Business'){
			$this->Image('http://meetuniv.com/assets/pdfImages/controll.png',18,190,30);
		}else if($_GET['maxtext1'] == 'Quantitative Analysis'){
			$this->Image('http://meetuniv.com/assets/pdfImages/qu.png',18,190,30);
		}else if($_GET['maxtext1'] == 'Research Development'){
			$this->Image('http://meetuniv.com/assets/pdfImages/research.png',18,190,30);
		}
		
		
		 if($_GET['mintext1'] == 'Influncing Other'){
			$this->Image('http://meetuniv.com/assets/pdfImages/influs.png',18,200,30);
		}else if($_GET['mintext1'] == 'Application of Technology'){
			$this->Image('http://meetuniv.com/assets/pdfImages/application.png',18,200,30);
		}else if($_GET['mintext1'] == 'Controlling Business'){
			$this->Image('http://meetuniv.com/assets/pdfImages/controll.png',18,200,30);
		}else if($_GET['mintext1'] == 'Quantitative Analysis'){
			$this->Image('http://meetuniv.com/assets/pdfImages/qu.png',18,200,30);
		}else if($_GET['mintext1'] == 'Research Development'){
			$this->Image('http://meetuniv.com/assets/pdfImages/research.png',18,200,30);
		}
		
		
		
		if($_GET['maxtext2'] == 'Security'){
			$this->Image('http://meetuniv.com/assets/pdfImages/secur.png',112,190,30);
		}else if($_GET['maxtext2'] == 'Variety'){
			$this->Image('http://meetuniv.com/assets/pdfImages/veriety.png',112,190,30);
		}else if($_GET['maxtext2'] == 'Affiliation'){
			$this->Image('http://meetuniv.com/assets/pdfImages/afff.png',112,190,30);
		}else if($_GET['maxtext2'] == 'Recognition'){
			$this->Image('http://meetuniv.com/assets/pdfImages/recog.png',112,190,30);
		}else if($_GET['maxtext2'] == 'Autonomy'){
			$this->Image('http://meetuniv.com/assets/pdfImages/auto.png',112,190,30);
		} 
		
		if($_GET['mintext2'] == 'Security'){
			$this->Image('http://meetuniv.com/assets/pdfImages/secur.png',112,200,30);
		}else if($_GET['mintext2'] == 'Variety'){
			$this->Image('http://meetuniv.com/assets/pdfImages/veriety.png',112,200,30);
		}else if($_GET['mintext2'] == 'Affiliation'){
			$this->Image('http://meetuniv.com/assets/pdfImages/afff.png',112,200,30);
		}else if($_GET['mintext2'] == 'Recognition'){
			$this->Image('http://meetuniv.com/assets/pdfImages/recog.png',112,200,30);
		}else if($_GET['mintext2'] == 'Autonomy'){
			$this->Image('http://meetuniv.com/assets/pdfImages/auto.png',112,200,30);
		}  
		
		//$this->Cell(0,10, 'Summary');
		//Max and Min for Interest Profile
		 //$this->Image('http://meetuniv.com//assets/pdfImages/interest_profile.png',10,210,80);
		$this->Image('http://meetuniv.com//assets/pdfImages/images1.jpg',70,185,27);
		/*$this->Cell(0,190, $_GET['maxtext1']);
		$this->Ln();
		$this->Cell(0,-180, $_GET['mintext1']);
		
		 $this->Ln(); */
		
		//Max and Min for Motivation and Work
		 //$this->Image('http://meetuniv.com//assets/pdfImages/motivation_and_work.png',10,210,80);
		$this->Image('http://meetuniv.com//assets/pdfImages/image2.jpg',160,185,27);
		/*$this->Cell(0,190, $_GET['maxtext2']);
		$this->Ln();
		$this->Cell(0,-180, $_GET['mintext2']); */
		
		//$this->Ln();
		
	}


	function PrintChapter($file)
	{
		$this->AddPage();
		//$this->ChapterTitle($num,$title);
		$this->ChapterBody($file);
		
	}
}

$pdf = new PDF();
$title = 'THE CAREER BATTERY';
$pdf->SetTitle($title);
//$pdf->SetAuthor('Jules Verne');
$pdf->PrintChapter('http://meetuniv.com//assets/pdfText.html');
//$pdf->PrintChapter(2,'THE CAREER BATTERY','http://localhost/CodeIgniter1/assets/test.html');
$pdf->Output();
?>