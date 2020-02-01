<?php
require "samp_query.php";

$serverIP = "playsamp.com";
$serverPort = 7777;

try
{
    $rQuery = new QueryServer( $serverIP, $serverPort );

    $aInformation = $rQuery->GetInfo( );
    $aServerRules = $rQuery->GetRules( );
    $aBasicPlayer = $rQuery->GetPlayers( );
    $aTotalPlayers = $rQuery->GetDetailedPlayers( );

    $rQuery->Close( );
}
catch (QueryServerException $pError)
{
    echo 'Server is offline';
}

if(isset($aInformation) && is_array($aInformation)){
}
?>