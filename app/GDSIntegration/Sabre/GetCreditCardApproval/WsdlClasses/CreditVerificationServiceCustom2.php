<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class CreditVerificationServiceCustom2 extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     */
    private static $classmap = array (
  'CreditVerificationRQ' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\CreditVerificationRQCustom2',
  'Credit' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\CreditCustom2',
  'CC_Info' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\CC_InfoCustom2',
  'PaymentCard' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\PaymentCardCustom2',
  'ItinTotalFare' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ItinTotalFareCustom2',
  'TotalFare' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\TotalFareCustom2',
  'DescriptiveBilling' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\DescriptiveBillingCustom2',
  'FreeText' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\FreeTextCustom2',
  'Amex' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\AmexCustom2',
  'Airplus' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\AirplusCustom2',
  'SabreHeader' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SabreHeaderCustom2',
  'DiagnosticResults' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\DiagnosticResultsCustom2',
  'Diagnostics' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\DiagnosticsCustom2',
  'Identification' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\IdentificationCustom2',
  'Identifier.System' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\IdentifierSystemCustom2',
  'Message.Condition' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\MessageConditionCustom2',
  'ProblemBase' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ProblemBaseCustom2',
  'ProblemSummary' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ProblemSummaryCustom2',
  'ResultSummary' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ResultSummaryCustom2',
  'Security' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SecurityCustom2',
  'Service' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ServiceCustom2',
  'Traces' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\TracesCustom2',
  'TraceRecord' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\TraceRecordCustom2',
  'TrackingID' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\TrackingIDCustom2',
  'STL_Payload' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\STL_PayloadCustom2',
  'Results' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ResultsCustom2',
  'ApplicationResults' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ApplicationResultsCustom2',
  'ProblemInformation' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ProblemInformationCustom2',
  'SystemSpecificResults' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SystemSpecificResultsCustom2',
  'HostCommand' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\HostCommandCustom2',
  'CreditVerificationRS' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\CreditVerificationRSCustom2',
  'SignatureType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SignatureTypeCustom2',
  'SignatureValueType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SignatureValueTypeCustom2',
  'SignedInfoType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SignedInfoTypeCustom2',
  'CanonicalizationMethodType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\CanonicalizationMethodTypeCustom2',
  'SignatureMethodType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SignatureMethodTypeCustom2',
  'ReferenceType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ReferenceTypeCustom2',
  'TransformsType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\TransformsTypeCustom2',
  'TransformType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\TransformTypeCustom2',
  'DigestMethodType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\DigestMethodTypeCustom2',
  'KeyInfoType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\KeyInfoTypeCustom2',
  'KeyValueType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\KeyValueTypeCustom2',
  'RetrievalMethodType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\RetrievalMethodTypeCustom2',
  'X509DataType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\X509DataTypeCustom2',
  'X509IssuerSerialType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\X509IssuerSerialTypeCustom2',
  'PGPDataType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\PGPDataTypeCustom2',
  'SPKIDataType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SPKIDataTypeCustom2',
  'ObjectType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ObjectTypeCustom2',
  'ManifestType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ManifestTypeCustom2',
  'SignaturePropertiesType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SignaturePropertiesTypeCustom2',
  'SignaturePropertyType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SignaturePropertyTypeCustom2',
  'DSAKeyValueType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\DSAKeyValueTypeCustom2',
  'RSAKeyValueType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\RSAKeyValueTypeCustom2',
  'Envelope' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\EnvelopeCustom2',
  'Header' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\HeaderCustom2',
  'Body' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\BodyCustom2',
  'Fault' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\FaultCustom2',
  'detail' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\detailCustom2',
  'Manifest' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ManifestCustom2',
  'Reference' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ReferenceCustom2',
  'Schema' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SchemaCustom2',
  'MessageHeader' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\MessageHeaderCustom2',
  'MessageData' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\MessageDataCustom2',
  'SyncReply' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SyncReplyCustom2',
  'MessageOrder' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\MessageOrderCustom2',
  'AckRequested' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\AckRequestedCustom2',
  'Acknowledgment' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\AcknowledgmentCustom2',
  'ErrorList' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ErrorListCustom2',
  'Error' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ErrorCustom2',
  'StatusResponse' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\StatusResponseCustom2',
  'StatusRequest' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\StatusRequestCustom2',
  'sequenceNumber.type' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\sequenceNumbertypeCustom2',
  'PartyId' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\PartyIdCustom2',
  'To' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ToCustom2',
  'From' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\FromCustom2',
  'Description' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\DescriptionCustom2',
  'UsernameToken' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\UsernameTokenCustom2',
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
     * @param CreditVerificationRQCustom2 $body
     * @return CreditVerificationRS
     */
    public function CreditVerificationRQ($body)
    {
      return $this->__soapCall('CreditVerificationRQ', array($body));
    }

}
