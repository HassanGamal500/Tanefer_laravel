<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class CreditVerificationServiceCustom4 extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     */
    private static $classmap = array (
  'CreditVerificationRQ' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\CreditVerificationRQCustom4',
  'Credit' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\CreditCustom4',
  'CC_Info' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\CC_InfoCustom4',
  'PaymentCard' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\PaymentCardCustom4',
  'ItinTotalFare' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ItinTotalFareCustom4',
  'TotalFare' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\TotalFareCustom4',
  'DescriptiveBilling' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\DescriptiveBillingCustom4',
  'FreeText' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\FreeTextCustom4',
  'Amex' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\AmexCustom4',
  'Airplus' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\AirplusCustom4',
  'SabreHeader' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SabreHeaderCustom4',
  'DiagnosticResults' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\DiagnosticResultsCustom4',
  'Diagnostics' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\DiagnosticsCustom4',
  'Identification' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\IdentificationCustom4',
  'Identifier.System' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\IdentifierSystemCustom4',
  'Message.Condition' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\MessageConditionCustom4',
  'ProblemBase' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ProblemBaseCustom4',
  'ProblemSummary' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ProblemSummaryCustom4',
  'ResultSummary' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ResultSummaryCustom4',
  'Security' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SecurityCustom4',
  'Service' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ServiceCustom4',
  'Traces' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\TracesCustom4',
  'TraceRecord' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\TraceRecordCustom4',
  'TrackingID' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\TrackingIDCustom4',
  'STL_Payload' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\STL_PayloadCustom4',
  'Results' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ResultsCustom4',
  'ApplicationResults' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ApplicationResultsCustom4',
  'ProblemInformation' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ProblemInformationCustom4',
  'SystemSpecificResults' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SystemSpecificResultsCustom4',
  'HostCommand' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\HostCommandCustom4',
  'CreditVerificationRS' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\CreditVerificationRSCustom4',
  'SignatureType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SignatureTypeCustom4',
  'SignatureValueType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SignatureValueTypeCustom4',
  'SignedInfoType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SignedInfoTypeCustom4',
  'CanonicalizationMethodType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\CanonicalizationMethodTypeCustom4',
  'SignatureMethodType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SignatureMethodTypeCustom4',
  'ReferenceType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ReferenceTypeCustom4',
  'TransformsType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\TransformsTypeCustom4',
  'TransformType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\TransformTypeCustom4',
  'DigestMethodType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\DigestMethodTypeCustom4',
  'KeyInfoType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\KeyInfoTypeCustom4',
  'KeyValueType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\KeyValueTypeCustom4',
  'RetrievalMethodType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\RetrievalMethodTypeCustom4',
  'X509DataType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\X509DataTypeCustom4',
  'X509IssuerSerialType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\X509IssuerSerialTypeCustom4',
  'PGPDataType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\PGPDataTypeCustom4',
  'SPKIDataType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SPKIDataTypeCustom4',
  'ObjectType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ObjectTypeCustom4',
  'ManifestType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ManifestTypeCustom4',
  'SignaturePropertiesType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SignaturePropertiesTypeCustom4',
  'SignaturePropertyType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SignaturePropertyTypeCustom4',
  'DSAKeyValueType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\DSAKeyValueTypeCustom4',
  'RSAKeyValueType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\RSAKeyValueTypeCustom4',
  'Envelope' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\EnvelopeCustom4',
  'Header' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\HeaderCustom4',
  'Body' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\BodyCustom4',
  'Fault' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\FaultCustom4',
  'detail' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\detailCustom4',
  'Manifest' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ManifestCustom4',
  'Reference' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ReferenceCustom4',
  'Schema' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SchemaCustom4',
  'MessageHeader' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\MessageHeaderCustom4',
  'MessageData' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\MessageDataCustom4',
  'SyncReply' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SyncReplyCustom4',
  'MessageOrder' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\MessageOrderCustom4',
  'AckRequested' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\AckRequestedCustom4',
  'Acknowledgment' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\AcknowledgmentCustom4',
  'ErrorList' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ErrorListCustom4',
  'Error' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ErrorCustom4',
  'StatusResponse' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\StatusResponseCustom4',
  'StatusRequest' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\StatusRequestCustom4',
  'sequenceNumber.type' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\sequenceNumbertypeCustom4',
  'PartyId' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\PartyIdCustom4',
  'To' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ToCustom4',
  'From' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\FromCustom4',
  'Description' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\DescriptionCustom4',
  'UsernameToken' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\UsernameTokenCustom4',
);

    /**
     * @param string $wsdl The wsdl file to use
     * @param array $options A array of config values
     */
    public function __construct(array $options = array(), $wsdl = null)
    {
    
  foreach (self::$classmap as $key => $value) {
    if (!isset($options['classmap'][$key])) {
      $options['classmap'][$key] = $value;
    }
  }
      $options = array_merge(array (
  'features' => 1,
), $options);
      if (!$wsdl) {
        $wsdl = 'http://files.developer.sabre.com/wsdl/tpfc/CreditVerificationLLS2.2.0RQ.wsdl';
      }
      parent::__construct($wsdl, $options);
    }

    /**
     * @param CreditVerificationRQCustom4 $body
     * @return CreditVerificationRS
     */
    public function CreditVerificationRQ($body)
    {
      return $this->__soapCall('CreditVerificationRQ', array($body));
    }

}
