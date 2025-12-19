<?php
namespace logan8920\IOCommentParser\templates;

class PositiveCommentTemplate
{
    public static function get(): array
    {
        return [

            /*-----------Business Positive -----------------*/
            // STANDARD BUSINESS POSITIVE
            "VISIT CONDUCTED AT {address} ON {field_visit_time}. ADDRESS FOUND, AND THE APPLICANT, {customer_name} WAS MET. HE CONFIRMED THAT HE HAS BEEN RUNNING A {nature_of_business} AT THE LOCATION FOR {business_years}. A {qr_observed} WAS OBSERVED. THE AREA IS {premise_type}. LOCAL INQUIRIES CONFIRMED THAT THE APPLICANT IS KNOWN IN THE AREA.",

            // FAMILY MEMBER MET
            "VISIT CONDUCTED AT {address} ON {field_visit_time}. ADDRESS FOUND AND THE APPLICANT'S FAMILY MEMBER, {person_available_name} WAS MET. HE CONFIRMED THAT THE APPLICANT HAS BEEN RUNNING A {nature_of_business} FOR {business_years}. A {qr_observed} WAS OBSERVED. THE AREA IS {premise_type}. LOCAL INQUIRIES CONFIRMED THAT THE APPLICANT IS KNOWN IN THE AREA.",

            // WITH RENT & EMPLOYEES
            "VISIT CONDUCTED AT {address} ON {field_visit_time}. ADDRESS FOUND AND THE APPLICANT, {customer_name} WAS MET. HE CONFIRMED THAT HE HAS BEEN RUNNING A {nature_of_business} FOR {business_years} WITH A MONTHLY RENT OF RS. {monthly_rent}. {employee_seen} EMPLOYEES WERE PRESENT AT THE SHOP. A {qr_observed} WAS OBSERVED. THE AREA IS {premise_type}.",

            // COMMERCIAL EMPHASIS
            "VISIT CONDUCTED AT {address} ON {field_visit_time}. ADDRESS FOUND, AND THE APPLICANT {customer_name} WAS MET AT THE LOCATION. HE CONFIRMED THAT HE IS RUNNING A {nature_of_business} FOR {business_years}. {employee_seen} EMPLOYEES WERE SEEN AT THE SHOP. A {qr_observed} WAS OBSERVED. THE AREA IS {premise_type}.",

            // NEIGHBOUR CONFIRMATION
            "VISIT CONDUCTED AT {address} ON {field_visit_time}. ADDRESS FOUND AND THE APPLICANT, {customer_name} WAS MET. HE CONFIRMED THAT HE HAS BEEN RUNNING A {nature_of_business} FOR {business_years}. A {qr_observed} WAS OBSERVED. LOCAL INQUIRIES FROM {merchant_neighbour_name} CONFIRMED THE BUSINESS ACTIVITY.",

            //BUSINESS SETUP FOCUS
            "VISIT CONDUCTED AT {address} ON {field_visit_time}. ADDRESS FOUND AND THE APPLICANT, {customer_name} WAS MET. HE CONFIRMED THAT HE HAS BEEN RUNNING A {nature_of_business} FOR {business_years}. THE TYPE OF SETUP IS {type_of_setup}. A {qr_observed} WAS OBSERVED.",

            //STOCK & BOARD SEEN
            "VISIT CONDUCTED AT {address} ON {field_visit_time}. ADDRESS FOUND AND THE APPLICANT, {customer_name} WAS MET. HE CONFIRMED THAT HE HAS BEEN RUNNING A {nature_of_business} FOR {business_years}. STOCK WAS SEEN AND BUSINESS BOARD WAS {business_board_seen}. A {qr_observed} WAS OBSERVED.",

            //RESIDENTIAL AREA BUSINESS
            "VISIT CONDUCTED AT {address} ON {field_visit_time}. ADDRESS FOUND AND THE APPLICANT, {customer_name} WAS MET. HE CONFIRMED THAT HE HAS BEEN RUNNING A {nature_of_business} FOR {business_years}. THE BUSINESS IS OPERATING IN A {premise_type} AREA. A {qr_observed} WAS OBSERVED.",

            //COMPACT POSITIVE
            "VISIT CONDUCTED AT {address} ON {field_visit_time}. ADDRESS FOUND AND THE APPLICANT {customer_name} WAS MET. BUSINESS FOUND POSITIVE. NATURE OF BUSINESS: {nature_of_business}. YEARS OF OPERATION: {business_years}. A {qr_observed} WAS OBSERVED. AREA TYPE: {premise_type}.",


            /*-----------Residential Positive -----------------*/
            // Applicant met at residence
            "VISIT CONDUCTED AT {address} ON {field_visit_time}. {finding}. THE APPLICANT, {customer_name}, WAS MET AT THE RESIDENCE. HE CONFIRMED THAT HE IS RESIDING AT THE GIVEN ADDRESS FOR THE PAST {business_years}. THE PREMISES IS {premise_area}. THE AREA IS {residence_type}. LOCAL ENQUIRIES {third_party_confirmation}.",

            // Family member met – applicant not available
            "VISIT CONDUCTED AT {address} ON {field_visit_time}. {finding}. THE APPLICANT WAS NOT AVAILABLE AT THE LOCATION; HOWEVER, HIS {relation_person_available}, 
            {person_available_name}, WAS MET. HE CONFIRMED THAT THE APPLICANT IS RESIDING AT THE GIVEN ADDRESS FOR THE PAST {business_years}. THE PREMISES IS {premise_area}. THE AREA IS {residence_type}. FAMILY ENQUIRIES CONFIRMED POSITIVE FEEDBACK.",

            // Rental residence
            "VISIT CONDUCTED AT {address} ON {field_visit_time}. {finding}. THE APPLICANT, {customer_name}, WAS MET AT THE LOCATION. HE CONFIRMED THAT HE IS STAYING AT THE GIVEN ADDRESS ON A RENTAL BASIS FOR THE PAST {business_years}. MONTHLY RENT OBSERVED AS RS. {monthly_rent}. THE PREMISES IS {premise_area}. THE AREA IS {residence_type}. NEIGHBOUR ENQUIRIES {merchant_neighbour_feedback}",

            // Residence verified through call & neighbours
            "VISIT CONDUCTED AT {address} ON {field_visit_time}. {finding}. WE CONNECTED WITH THE APPLICANT OVER CALL AND CALL RESPONSE {call_response} AND {call_remarks}. THE PREMISES IS {residence_type}. THE AREA IS {premise_area}. LOCAL ENQUIRIES CONFIRMED POSITIVE FEEDBACK.",

            // Additional remarks / limited observation
            "VISIT CONDUCTED AT {address} ON {field_visit_time}. {finding}. THE APPLICANT, {customer_name}, WAS MET AT THE LOCATION. HE CONFIRMED THAT HE IS CURRENTLY RESIDING AT THE GIVEN ADDRESS. {other_details}. THE PREMISES IS {residence_type}. THE AREA IS {premise_area}. LOCAL ENQUIRIES {third_party_confirmation}."

        ];
    }
}
