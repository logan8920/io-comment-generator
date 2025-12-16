<?php
namespace logan8920\IOCommentParser\templates;

class ReferredCommentTemplate
{
    public static function get(): array
    {
        return [

            // 1️⃣ Met applicant – full verification
            "VISIT CONDUCTED AT {address} ON {field_visit_time}. 
            {finding_result}, AND THE APPLICANT, {customer_name} WAS MET. 
            HE CONFIRMED THAT HE HAS BEEN RUNNING A {nature_of_business} AT THE LOCATION FOR {business_years}. 
            {employee_seen}. 
            {qr_observed}. 
            THE AREA IS {premise_area}. 
            LOCAL INQUIRIES CONFIRMED THAT THE APPLICANT IS KNOWN IN THE AREA.",

            // 2️⃣ Met family member / related person
            "VISIT CONDUCTED AT {address} ON {field_visit_time}. 
            {finding_result}, AND THE APPLICANT’S {relation_person_available}, {person_available_name} WAS MET. 
            HE CONFIRMED THAT THE APPLICANT HAS BEEN RUNNING A {nature_of_business} AT THE LOCATION FOR {business_years}. 
            MONTHLY RENT OBSERVED AS RS. {monthly_rent}. 
            {qr_observed}. 
            THE AREA IS {premise_area}. 
            LOCAL INQUIRIES CONFIRMED POSITIVE FEEDBACK.",

            // 3️⃣ Business verified – no rent info
            "VISIT CONDUCTED AT {address} ON {field_visit_time}. 
            {finding_result}, AND THE APPLICANT, {customer_name} WAS MET. 
            HE CONFIRMED THAT HE HAS BEEN RUNNING A {nature_of_business} AT THE LOCATION FOR {business_years}. 
            {qr_observed}. 
            THE AREA IS {premise_area}. 
            NEIGHBOUR ENQUIRY CONFIRMED THAT THE APPLICANT IS KNOWN IN THE AREA.",

            // 4️⃣ Residence-based business
            "VISIT CONDUCTED AT {address} ON {field_visit_time}. 
            {finding_result}, AND THE APPLICANT, {customer_name} WAS MET. 
            HE CONFIRMED THAT HE IS OPERATING A {nature_of_business} FROM {residence_type} PREMISES FOR {business_years}. 
            {qr_observed}. 
            THE AREA IS {premise_area}. 
            LOCAL INQUIRIES CONFIRMED POSITIVE FEEDBACK.",

            // 5️⃣ Limited space / image remarks
            "VISIT CONDUCTED AT {address} ON {field_visit_time}. 
            {finding_result}, AND THE APPLICANT, {customer_name} WAS MET. 
            HE CONFIRMED THAT HE HAS BEEN RUNNING A {nature_of_business} AT THE LOCATION FOR {business_years}. 
            {other_details}. 
            {qr_observed}. 
            THE AREA IS {premise_area}. 
            LOCAL INQUIRIES CONFIRMED THAT THE APPLICANT IS KNOWN IN THE AREA."
        ];
    }
}
