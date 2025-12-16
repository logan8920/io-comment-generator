<?php

namespace logan8920\IOCommentParser\templates;

class NegitiveCommentTemplate
{
    public static function get(): array
    {
        return [

            // 1️⃣ Contacted person + call not picked
            "WE VISITED THE REGISTERED ADDRESS AT {address} ON {field_visit_time}. {findings}. 
            WE MET WITH {person_available_name} ({relation_person_available}). 
            THE PREMISES IS {premise_type} IN A {premise_area} AREA. 
            BUSINESS TYPE OBSERVED AS {nature_of_business}. 
            BUSINESS NAME BOARD STATUS: {business_board_seen}. 
            CALL WAS NOT PICKED BY THE APPLICANT. 
            NEIGHBOUR FEEDBACK: {merchant_neighbour_feedback}. 
            OTHER OBSERVATIONS: {other_details}.",

            // 2️⃣ Contacted person + call picked
            "WE VISITED THE REGISTERED ADDRESS AT {address} ON {field_visit_time}. {findings}. 
            WE MET WITH {person_available_name} ({relation_person_available}) AT THE LOCATION. 
            THE PREMISES TYPE IS {premise_type} AND AREA IS {premise_area}. 
            BUSINESS TYPE FOUND AS {nature_of_business}. 
            CALL WAS PICKED BY THE APPLICANT AND RESPONSE WAS {call_remarks}. 
            NEIGHBOUR CONFIRMATION: {merchant_neighbour_feedback}.",

            // 3️⃣ No one met + neighbour enquiry
            "WE VISITED THE REGISTERED ADDRESS AT {address} ON {field_visit_time}. {findings}. 
            WE COULD NOT MEET ANY PERSON AT THE LOCATION. 
            PREMISES TYPE IS {premise_type} AND AREA IS {premise_area}. 
            BUSINESS BOARD STATUS: {business_board_seen}. 
            NEIGHBOUR ENQUIRY RESULT: {merchant_neighbour_feedback}. 
            CALL STATUS WITH APPLICANT: {call_response}.",

            // 4️⃣ TPC based negative
            "WE VISITED THE REGISTERED ADDRESS AT {address} ON {field_visit_time}. {findings}. 
            NO DIRECT CONTACT WAS POSSIBLE AT THE LOCATION. 
            THIRD PARTY CONFIRMATION RECEIVED AS: {third_party_confirmation}. 
            BUSINESS TYPE: {nature_of_business}. 
            AREA TYPE: {premise_area}. 
            CALL STATUS: {call_response}.",

            // 5️⃣ Employees not seen
            "WE VISITED THE REGISTERED ADDRESS AT {address} ON {field_visit_time}. {findings}. 
            BUSINESS TYPE OBSERVED AS {nature_of_business}. 
            NO OF EMPLOYEES SEEN: {no_emp_seen}. 
            PREMISES TYPE: {premise_type}. 
            CALL RESPONSE FROM APPLICANT: {call_remarks}.",

            // 6️⃣ Residence based business
            "WE VISITED THE REGISTERED ADDRESS AT {address} ON {field_visit_time}. {findings}. 
            BUSINESS OPERATING FROM {residence_type} PREMISES. 
            AREA TYPE: {premise_area}. 
            BUSINESS BOARD STATUS: {business_board_seen}. 
            CALL RESPONSE: {call_remarks}.",

            // 7️⃣ Strong neighbour confirmation negative
            "WE VISITED THE REGISTERED ADDRESS AT {address} ON {field_visit_time}. {findings}. 
            NEIGHBOUR ENQUIRY CONFIRMED: {merchant_neighbour_feedback}. 
            BUSINESS TYPE: {nature_of_business}. 
            PREMISES TYPE: {premise_type}. 
            CALL STATUS: {call_response}.",

            // 8️⃣ Other observations focused
            "WE VISITED THE REGISTERED ADDRESS AT {address} ON {field_visit_time}. {findings}. 
            OTHER IMPORTANT OBSERVATIONS: {other_details}. 
            AREA TYPE: {premise_area}. 
            BUSINESS TYPE: {nature_of_business}. 
            CALL RESPONSE: {call_remarks}.",
        ];
    }
}
