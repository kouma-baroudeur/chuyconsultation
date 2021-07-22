<?php
class PatientPDF extends FPDF
{
    protected $B = 0;
    protected $I = 0;
    protected $U = 0;
    protected $HREF = '';
    
    function Header()
    {
        if ($this->PageNo() == 1 ) {
             // Logo
            $this->Image(DOCHEADER, 24, 1, 150, 80);
            // Line break
            $this->Ln(60);
        }
    }

    function Footer()
    {
        //set a default timezone
        date_default_timezone_set('UTC+1');
        //Date
        $tDate = date('F j, Y, g:i:s a');
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 12);
        // Text color in gray
        $this->SetTextColor(128);
        // Page number
        $this->Cell(0, 10,utf8_decode('Page ' . $this->PageNo().'   
        CHUYC    
        '.$tDate.'
        +237 693 553 454
        '.$this->Image(SITELOGO, 189, 280, 10, 10,'', URLROOT)), 0, 0, 'L');
    }

    function ChapterTitle($num, $label)
    {
        // Arial 18
        $this->SetFont('Arial', 'B', 18);
        // Background color
        $this->SetFillColor(200, 220, 255);
        // Title 
        $this->Cell(0, 15, "$num : $label", 0, 2, 'C', true);
        // Line break
        $this->Ln(10);
    }
    /**info de base du patient et son contact d'urgence */
    function Info($param, $data)
    {
        // Times 12
        $this->SetFont('Times','',14);
        // Output justified text
        $this->MultiCell(0,7,utf8_decode("$param : $data"));
        // Line break
        $this->Ln();
    }
    /**petite entete du contact d'urgence */
    function MidHead($title)
    {
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Calculate width of title and position
        $w = $this->GetStringWidth($title)+6;
        $this->SetX((210-$w)/2);
        // Colors of frame, background and text
        $this->SetDrawColor(0,80,180);
        $this->SetFillColor(230,230,0);
        //$this->SetTextColor(220,50,50);
        // Thickness of frame (1 mm)
        $this->SetLineWidth(1);
        // Title
        $this->Cell($w,9,$title,1,1,'C',true);
        // Line break
        $this->Ln(10);
    }
    function Divider()
    {
        $this->MultiCell(0,7,'------------------------------------------------------------------------------------------------------------------');
        // Line break
        $this->Ln(10);
    }

}
