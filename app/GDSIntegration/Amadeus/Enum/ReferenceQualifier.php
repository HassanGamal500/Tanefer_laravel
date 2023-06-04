<?php


namespace App\GDSIntegration\Amadeus\Enum;

/*
* List of Reference Qualifiers and their description as Amadeus Documentation
*/

class ReferenceQualifier
{
    /**
     * Service coverage reference number
     */
    const SERVICE_INFO = 'OC';
    /*
     * Leg reference number
     * */
    const LEG = 'L';
    /*
     * Passenger/traveller reference number
     * */
    const PASSENGER = 'P';
    /*
     * Proposed segment reference number
     * */
    const PROPOSED_SEGMENT = 'PS';
    /*
     * Requested segment reference number
     * */
    const REQUESTED_SEGMENT = 'RS';
    /*
     * Segment/service reference number
     * */
    const SEGMENT_OR_SERVICE = 'S';
    /*
     * Reason of discount reference number
     * */
    const DISCOUNT_REASON = 'RD';
    /*
     * Infant
     * */
    const INFANT = 'INF';
    /*
     * Unique passenger reference identification
     * */
    const UNIQUE_PASSENGER = '1';
    /*
     * Passenger sequence number
     * */
    const PASSENGER_SEQUENCE = '2';
    /*
     * Passenger standby number
     * */
    const PASSENGER_STANDBY = '3';
    /*
     * Passenger boarding security number
     * */
    const PASSENGER_BOARDING = '4';
    /*
     * Passenger ticket number
     * */
    const PASSENGER_TICKET = '5';
    /*
     * Passenger confirmation number
     * */
    const PASSENGER_CONFIRMATION = '6';
    /*
     * Date of birth
     * */
    const DATE_OF_BIRTH = '7';
    /*
     * Exceptional PNR Security Identification
     * */
    const EXCEPTIONAL_PNR_IDENTIFICATION = '700';
    /*
     * Agency grouping identification
     * */
    const AGENCY_IDENTIFICATION = '701';
    /*
     * Ticketing data
     * */
    const TICKETING_DATA = '702';
    /*
     * Message number for free text
     * */
    const MESSAGE_NUMBER = '703';
    /*
     * Account/Product reference number
     * */
    const ACCOUNT_OR_PRODUCT = 'A';
    /*
     * Business
     * */
    const BUSINESS = 'B';
    /*
     * FAX
     * */
    const FAX = 'F';
    /*
     * HOME
     * */
    const HOME = 'H';
    /*
     * Teletype address
     * */
    const TELETYPE_ADDRESS = 'T';
    /*
     * Not known
     * */
    const NOT_KNOWN = 'XX';
    /*
     * Bound reference number
     * */
    const BOUND = 'BR';
    /*
     * Fare Family
     * */
    const FARE_FAMILY = 'F';
    /*
     * Kilometer
     * */
    const KILOMETER = 'K';
    /*
     * Fee/reduction reference number
     * */
    const FEE_OR_REDUCTION = 'R';
    /*
     * Minirule reference number
     * */
    const MINIRULE = 'M';
    /*
     * Recommendation identification number
     * */
    const RECOMMENDATION_IDENTIFICATION = 'REC';
    /*
     * Recommendation Availability context
     * */
    const RECOMMENDATION_AVAILABILITY = 'A';
    /*
     * Baggage coverage reference
     * */
    const BAGGAGE_INFO = 'B';
    /*
     * Bucket reference
     * */
    const BUCKET = 'BK';
    /*
     * Currency
     * */
    const CURRENCY = 'C';
    /*
     * EMD item reference number
     * */
    const EMD_ITEM = 'ER';
    /*
     * Miles Accrual Reference
     * */
    const MILES_ACCRUAL = 'MA';
    /*
     * Multi dimensional Reference number
     * */
    const MULTI_DIMENSIONAL = 'MD';
    /*
     * Office Id reference number
     * */
    const OFFICE_ID = 'O';
    /*
     * OC fees item reference number
     * */
    const OC_FEES_ITEM = 'OC';
    /*
     * OC fees item reference number in OWC for requested segment 1
     * */
    const OC_FEES_FOR_REQUESTED_SEGMENT1 = 'OC1';
    /*
     * OC fees item reference number in OWC for requested segment 2
     * */
    const OC_FEES_FOR_REQUESTED_SEGMENT2 = 'OC2';
    /*
     * Offer id reference number
     * */
    const OFFER_ID = 'OI';
    /*
     * Alternate Price reference
     * */
    const ALTERNATE_PRICE = 'P';
    /*
     * Upsell
     * */
    const UPSELL = 'U';

}
