<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class CreditVerificationService extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     */
    private static $classmap = array (
      'CreditVerificationRQ' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\CreditVerificationRQ',
      'Credit' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\Credit',
      'CC_Info' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\CC_Info',
      'PaymentCard' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\PaymentCard',
      'ItinTotalFare' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ItinTotalFare',
      'TotalFare' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\TotalFare',
      'DescriptiveBilling' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\DescriptiveBilling',
      'FreeText' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\FreeText',
      'Amex' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\Amex',
      'Airplus' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\Airplus',
      'SabreHeader' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SabreHeader',
      'DiagnosticResults' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\DiagnosticResults',
      'Diagnostics' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\Diagnostics',
      'Identification' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\Identification',
      'Identifier.System' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\IdentifierSystem',
      'Message.Condition' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\MessageCondition',
      'ProblemBase' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ProblemBase',
      'ProblemSummary' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ProblemSummary',
      'ResultSummary' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ResultSummary',
      'Security' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\Security',
      'Service' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\Service',
      'Traces' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\Traces',
      'TraceRecord' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\TraceRecord',
      'TrackingID' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\TrackingID',
      'STL_Payload' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\STL_Payload',
      'Results' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\Results',
      'ApplicationResults' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ApplicationResults',
      'ProblemInformation' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ProblemInformation',
      'SystemSpecificResults' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SystemSpecificResults',
      'HostCommand' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\HostCommand',
      'CreditVerificationRS' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\CreditVerificationRS',
      'SignatureType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SignatureType',
      'SignatureValueType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SignatureValueType',
      'SignedInfoType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SignedInfoType',
      'CanonicalizationMethodType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\CanonicalizationMethodType',
      'SignatureMethodType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SignatureMethodType',
      'ReferenceType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ReferenceType',
      'TransformsType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\TransformsType',
      'TransformType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\TransformType',
      'DigestMethodType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\DigestMethodType',
      'KeyInfoType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\KeyInfoType',
      'KeyValueType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\KeyValueType',
      'RetrievalMethodType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\RetrievalMethodType',
      'X509DataType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\X509DataType',
      'X509IssuerSerialType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\X509IssuerSerialType',
      'PGPDataType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\PGPDataType',
      'SPKIDataType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SPKIDataType',
      'ObjectType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ObjectType',
      'ManifestType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ManifestType',
      'SignaturePropertiesType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SignaturePropertiesType',
      'SignaturePropertyType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SignaturePropertyType',
      'DSAKeyValueType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\DSAKeyValueType',
      'RSAKeyValueType' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\RSAKeyValueType',
      'Envelope' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\Envelope',
      'Header' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\Header',
      'Body' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\Body',
      'Fault' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\Fault',
      'detail' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\detail',
      'Manifest' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\Manifest',
      'Reference' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\Reference',
      'Schema' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\Schema',
      'MessageHeader' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\MessageHeader',
      'MessageData' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\MessageData',
      'SyncReply' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\SyncReply',
      'MessageOrder' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\MessageOrder',
      'AckRequested' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\AckRequested',
      'Acknowledgment' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\Acknowledgment',
      'ErrorList' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\ErrorList',
      'Error' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\Error',
      'StatusResponse' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\StatusResponse',
      'StatusRequest' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\StatusRequest',
      'sequenceNumber.type' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\sequenceNumbertype',
      'PartyId' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\PartyId',
      'To' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\To',
      'From' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\From',
      'Description' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\Description',
      'UsernameToken' => 'App\\GDSIntegration\\Sabre\\GetCreditCardApproval\\WsdlClasses\\UsernameToken',
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
     * @param CreditVerificationRQ $body
     * @return CreditVerificationRS
     */
    public function CreditVerificationRQ(CreditVerificationRQ $body)
    {
      return $this->__soapCall('CreditVerificationRQ', array($body));
    }

}
