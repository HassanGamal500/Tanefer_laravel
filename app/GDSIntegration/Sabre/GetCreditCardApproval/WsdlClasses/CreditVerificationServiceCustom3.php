<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class CreditVerificationServiceCustom3 extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     */
    private static $classmap = array (
  'CreditVerificationRQ' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\CreditVerificationRQCustom3',
  'Credit' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\CreditCustom3',
  'CC_Info' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\CC_InfoCustom3',
  'PaymentCard' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\PaymentCardCustom3',
  'ItinTotalFare' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ItinTotalFareCustom3',
  'TotalFare' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\TotalFareCustom3',
  'DescriptiveBilling' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\DescriptiveBillingCustom3',
  'FreeText' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\FreeTextCustom3',
  'Amex' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\AmexCustom3',
  'Airplus' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\AirplusCustom3',
  'SabreHeader' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SabreHeaderCustom3',
  'DiagnosticResults' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\DiagnosticResultsCustom3',
  'Diagnostics' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\DiagnosticsCustom3',
  'Identification' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\IdentificationCustom3',
  'Identifier.System' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\IdentifierSystemCustom3',
  'Message.Condition' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\MessageConditionCustom3',
  'ProblemBase' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ProblemBaseCustom3',
  'ProblemSummary' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ProblemSummaryCustom3',
  'ResultSummary' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ResultSummaryCustom3',
  'Security' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SecurityCustom3',
  'Service' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ServiceCustom3',
  'Traces' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\TracesCustom3',
  'TraceRecord' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\TraceRecordCustom3',
  'TrackingID' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\TrackingIDCustom3',
  'STL_Payload' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\STL_PayloadCustom3',
  'Results' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ResultsCustom3',
  'ApplicationResults' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ApplicationResultsCustom3',
  'ProblemInformation' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ProblemInformationCustom3',
  'SystemSpecificResults' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SystemSpecificResultsCustom3',
  'HostCommand' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\HostCommandCustom3',
  'CreditVerificationRS' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\CreditVerificationRSCustom3',
  'SignatureType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SignatureTypeCustom3',
  'SignatureValueType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SignatureValueTypeCustom3',
  'SignedInfoType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SignedInfoTypeCustom3',
  'CanonicalizationMethodType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\CanonicalizationMethodTypeCustom3',
  'SignatureMethodType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SignatureMethodTypeCustom3',
  'ReferenceType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ReferenceTypeCustom3',
  'TransformsType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\TransformsTypeCustom3',
  'TransformType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\TransformTypeCustom3',
  'DigestMethodType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\DigestMethodTypeCustom3',
  'KeyInfoType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\KeyInfoTypeCustom3',
  'KeyValueType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\KeyValueTypeCustom3',
  'RetrievalMethodType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\RetrievalMethodTypeCustom3',
  'X509DataType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\X509DataTypeCustom3',
  'X509IssuerSerialType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\X509IssuerSerialTypeCustom3',
  'PGPDataType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\PGPDataTypeCustom3',
  'SPKIDataType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SPKIDataTypeCustom3',
  'ObjectType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ObjectTypeCustom3',
  'ManifestType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ManifestTypeCustom3',
  'SignaturePropertiesType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SignaturePropertiesTypeCustom3',
  'SignaturePropertyType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SignaturePropertyTypeCustom3',
  'DSAKeyValueType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\DSAKeyValueTypeCustom3',
  'RSAKeyValueType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\RSAKeyValueTypeCustom3',
  'Envelope' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\EnvelopeCustom3',
  'Header' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\HeaderCustom3',
  'Body' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\BodyCustom3',
  'Fault' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\FaultCustom3',
  'detail' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\detailCustom3',
  'Manifest' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ManifestCustom3',
  'Reference' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ReferenceCustom3',
  'Schema' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SchemaCustom3',
  'MessageHeader' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\MessageHeaderCustom3',
  'MessageData' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\MessageDataCustom3',
  'SyncReply' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SyncReplyCustom3',
  'MessageOrder' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\MessageOrderCustom3',
  'AckRequested' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\AckRequestedCustom3',
  'Acknowledgment' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\AcknowledgmentCustom3',
  'ErrorList' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ErrorListCustom3',
  'Error' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ErrorCustom3',
  'StatusResponse' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\StatusResponseCustom3',
  'StatusRequest' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\StatusRequestCustom3',
  'sequenceNumber.type' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\sequenceNumbertypeCustom3',
  'PartyId' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\PartyIdCustom3',
  'To' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ToCustom3',
  'From' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\FromCustom3',
  'Description' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\DescriptionCustom3',
  'UsernameToken' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\UsernameTokenCustom3',
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
     * @param CreditVerificationRQCustom3 $body
     * @return CreditVerificationRS
     */
    public function CreditVerificationRQ($body)
    {
      return $this->__soapCall('CreditVerificationRQ', array($body));
    }

}
