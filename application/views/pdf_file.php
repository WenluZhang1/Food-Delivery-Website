<?php 
	$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
	$pdf->SetTitle('My Invoice');
	$pdf->SetHeaderMargin(20);
	$pdf->SetTopMargin(20);
	$pdf->setFooterMargin(20);
	$pdf->SetAutoPageBreak(true);
	$pdf->SetAuthor('Iris');
	$pdf->SetDisplayMode('real', 'default');
	$pdf->SetFont('helvetica', '', 20);

	$pdf->AddPage();

	$price = 0;
	if(isset($orderDetail)){
		foreach($orderDetail as $row){
			$pdf->Write(5, "Restaurant: " . $row->Rname);
			$pdf->Ln();
			$pdf->Write(5, "Meal: " . $row->dishName);
			$pdf->Ln();
			$pdf->Write(5, "Price: $" . $row->price);
			$pdf->Ln(18);
			$price = $price + $row->price;
		}
	}
	$pdf->Write(5, "Toal Price: $" . $price);
	$pdf->Output('My-Invoice.pdf', 'I');
?>