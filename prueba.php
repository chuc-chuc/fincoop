<?php
function calcularIntereses($saldoPendiente, $tasaInteresAnual, $diasTranscurridos)
{
    $tasaInteresDiaria = $tasaInteresAnual / 365;
    return $saldoPendiente * $tasaInteresDiaria * $diasTranscurridos;
}

function calcularMora($saldoPendiente, $tasaMoraAnual, $diasRetraso)
{
    $tasaMoraDiaria = $tasaMoraAnual / 365;
    return $saldoPendiente * $tasaMoraDiaria * $diasRetraso;
}

function calcularPago($saldoPendiente, $abonoCapital, $tasaInteresAnual, $diasTranscurridos, $tasaMoraAnual, $diasRetraso)
{
    $intereses = calcularIntereses($saldoPendiente, $tasaInteresAnual, $diasTranscurridos);
    $mora = $diasRetraso > 0 ? calcularMora($saldoPendiente, $tasaMoraAnual, $diasRetraso) : 0;
    return $abonoCapital + $intereses + $mora;
}

// Datos de ejemplo
$saldoPendiente = 10000; // Saldo pendiente del préstamo
$abonoCapital = 100; // Monto del abono al capital mensual
$tasaInteresAnual = 0.10; // Tasa de interés anual (10%)
$tasaMoraAnual = 0.15; // Tasa de mora anual (15%)
$fechaCredito = '2023-01-01'; // Fecha en que se dio el crédito
$fechaActual = '2023-07-01'; // Fecha actual o de pago

// Cálculo de los días transcurridos desde el último pago
$datetimeCredito = new DateTime($fechaCredito);
$datetimeActual = new DateTime($fechaActual);
$diasTranscurridos = $datetimeCredito->diff($datetimeActual)->days;

// Supongamos que los pagos son mensuales y calculamos el último pago
$ultimoPago = clone $datetimeCredito;
while ($ultimoPago <= $datetimeActual) {
    $ultimoPago->modify('+1 month');
}
$ultimoPago->modify('-1 month');

// Cálculo de los días de retraso
$diasRetraso = $datetimeActual->diff($ultimoPago)->days;

// Cálculo del pago total para cada tipo de crédito
$pagoFlat = calcularPago($saldoPendiente, $abonoCapital, $tasaInteresAnual, $diasTranscurridos, $tasaMoraAnual, $diasRetraso);

$pagoNivelada = calcularPago($saldoPendiente, $abonoCapital, $tasaInteresAnual, $diasTranscurridos, $tasaMoraAnual, $diasRetraso);

$pagoSobreSaldos = calcularPago($saldoPendiente, $abonoCapital, $tasaInteresAnual, $diasTranscurridos, $tasaMoraAnual, $diasRetraso);

echo "Monto total a pagar (Flat): $" . number_format($pagoFlat, 2) . "\n";
echo "Monto total a pagar (Cuota Nivelada): $" . number_format($pagoNivelada, 2) . "\n";
echo "Monto total a pagar (Sobre Saldos): $" . number_format($pagoSobreSaldos, 2) . "\n";
