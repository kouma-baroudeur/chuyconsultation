<?php
class PatientPDF extends FPDF
{

    function Header()
    {
        // Logo
        $this->Image(DOCHEADER, 24, 1, 150, 80);
        // Line break
        $this->Ln(60);
    }

    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 12);
        // Text color in gray
        $this->SetTextColor(128);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'L');
    }

    function ChapterTitle($num, $label)
    {
        // Arial 12
        $this->SetFont('Arial', 'B', 20);
        // Background color
        $this->SetFillColor(200, 220, 255);
        // Title
        $this->Cell(0, 20, "$num : $label", 0, 2, 'C', true);
        // Line break
        $this->Ln(4);
    }

    function ChapterBody($file)
    {
        // Read text file
        $txt = file_get_contents($file);
        // Times 12
        $this->SetFont('Times', '', 12);
        // Output justified text
        $this->MultiCell(0, 5, $data['userId']->email);
        // Line break
        $this->Ln();
        // Mention in italics
        $this->SetFont('', 'I');
        $this->Cell(0, 5, '(end of excerpt)');
    }

    function PrintChapter($num, $title, $file)
    {
        $this->AddPage();
        $this->ChapterTitle($num, $title);
        $this->ChapterBody($file);
    }
}
