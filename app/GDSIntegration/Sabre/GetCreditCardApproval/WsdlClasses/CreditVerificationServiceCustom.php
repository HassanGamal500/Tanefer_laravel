<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class CreditVerificationServiceCustom extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     */
    private static $classmap = array (
      'CreditVerificationRQ' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\CreditVerificationRQCustom',
      'Credit' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\CreditCustom',
      'CC_Info' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\CC_InfoCustom',
      'PaymentCard' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\PaymentCardCustom',
      'ItinTotalFare' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ItinTotalFareCustom',
      'TotalFare' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\TotalFareCustom',
      'DescriptiveBilling' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\DescriptiveBillingCustom',
      'FreeText' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\FreeTextCustom',
      'Amex' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\AmexCustom',
      'Airplus' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\AirplusCustom',
      'SabreHeader' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SabreHeaderCustom',
      'DiagnosticResults' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\DiagnosticResultsCustom',
      'Diagnostics' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\DiagnosticsCustom',
      'Identification' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\IdentificationCustom',
      'Identifier.System' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\IdentifierSystemCustom',
      'Message.Condition' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\MessageConditionCustom',
      'ProblemBase' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ProblemBaseCustom',
      'ProblemSummary' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ProblemSummaryCustom',
      'ResultSummary' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ResultSummaryCustom',
      'Security' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SecurityCustom',
      'Service' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ServiceCustom',
      'Traces' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\TracesCustom',
      'TraceRecord' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\TraceRecordCustom',
      'TrackingID' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\TrackingIDCustom',
      'STL_Payload' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\STL_PayloadCustom',
      'Results' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ResultsCustom',
      'ApplicationResults' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ApplicationResultsCustom',
      'ProblemInformation' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ProblemInformationCustom',
      'SystemSpecificResults' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SystemSpecificResultsCustom',
      'HostCommand' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\HostCommandCustom',
      'CreditVerificationRS' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\CreditVerificationRSCustom',
      'SignatureType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SignatureTypeCustom',
      'SignatureValueType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SignatureValueTypeCustom',
      'SignedInfoType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SignedInfoTypeCustom',
      'CanonicalizationMethodType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\CanonicalizationMethodTypeCustom',
      'SignatureMethodType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SignatureMethodTypeCustom',
      'ReferenceType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ReferenceTypeCustom',
      'TransformsType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\TransformsTypeCustom',
      'TransformType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\TransformTypeCustom',
      'DigestMethodType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\DigestMethodTypeCustom',
      'KeyInfoType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\KeyInfoTypeCustom',
      'KeyValueType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\KeyValueTypeCustom',
      'RetrievalMethodType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\RetrievalMethodTypeCustom',
      'X509DataType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\X509DataTypeCustom',
      'X509IssuerSerialType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\X509IssuerSerialTypeCustom',
      'PGPDataType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\PGPDataTypeCustom',
      'SPKIDataType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SPKIDataTypeCustom',
      'ObjectType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ObjectTypeCustom',
      'ManifestType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ManifestTypeCustom',
      'SignaturePropertiesType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SignaturePropertiesTypeCustom',
      'SignaturePropertyType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SignaturePropertyTypeCustom',
      'DSAKeyValueType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\DSAKeyValueTypeCustom',
      'RSAKeyValueType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\RSAKeyValueTypeCustom',
      'Envelope' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\EnvelopeCustom',
      'Header' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\HeaderCustom',
      'Body' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\BodyCustom',
      'Fault' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\FaultCustom',
      'detail' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\detailCustom',
      'Manifest' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ManifestCustom',
      'Reference' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ReferenceCustom',
      'Schema' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SchemaCustom',
      'MessageHeader' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\MessageHeaderCustom',
      'MessageData' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\MessageDataCustom',
      'SyncReply' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SyncReplyCustom',
      'MessageOrder' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\MessageOrderCustom',
      'AckRequested' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\AckRequestedCustom',
      'Acknowledgment' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\AcknowledgmentCustom',
      'ErrorList' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ErrorListCustom',
      'Error' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ErrorCustom',
      'StatusResponse' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\StatusResponseCustom',
      'StatusRequest' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\StatusRequestCustom',
      'sequenceNumber.type' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\sequenceNumbertypeCustom',
      'PartyId' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\PartyIdCustom',
      'To' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ToCustom',
      'From' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\FromCustom',
      'Description' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\DescriptionCustom',
      'UsernameToken' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\UsernameTokenCustom',
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
     * @param CreditVerificationRQCustom $body
     * @return CreditVerificationRS
     */
    public function CreditVerificationRQ($body)
    {
      return $this->__soapCall('CreditVerificationRQ', array($body));
    }

}
