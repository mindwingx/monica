<?php

use App\Constants\Endpoints;
use Illuminate\Support\Facades\Route;

//['ep'] is equal to 'EndPoint'

Route::apiResource(Endpoints::API_STATISTICS['ep']['crud'],Endpoints::API_STATISTICS['class'],['only' => ['index']])
    ->name('index', Endpoints::API_STATISTICS['name']);

Route::resource(Endpoints::API_COMPLIANCE['ep']['crud'], Endpoints::API_COMPLIANCE['class'], ['only' => ['index', 'show']]);

Route::resource(Endpoints::API_CURRENCY['ep']['crud'], Endpoints::API_CURRENCY['class'], ['only' => ['index', 'show']])
    ->name('index', Endpoints::API_CURRENCY['name']);

Route::group(['middleware' => ['auth:api']], function () {
    Route::get(Endpoints::API['ep']['success']['uri'], Endpoints::API['ep']['success']['action'])
        ->name(Endpoints::API['name']);

    Route::name('api.')->group(function () {
        // Me
        Route::get(Endpoints::API_USER['ep']['me']['uri'], Endpoints::API_USER['ep']['me']['action']);
        Route::get(Endpoints::API_USER['ep']['compliance']['uri'], Endpoints::API_USER['ep']['compliance']['action']);
        Route::get(Endpoints::API_USER['ep']['compliance_by_id']['uri'], Endpoints::API_USER['ep']['compliance_by_id']['action']);
        Route::post(Endpoints::API_USER['ep']['set_compliance']['uri'], Endpoints::API_USER['ep']['set_compliance']['action']);

        // Contacts
        Route::apiResource(Endpoints::API_CONTACT['ep']['crud'], Endpoints::API_CONTACT['class'])
            ->names(Endpoints::API_CONTACT['name']);

        Route::post(Endpoints::API_ME['ep']['create_contact']['uri'], Endpoints::API_ME['ep']['create_contact']['action']);
        Route::delete(Endpoints::API_ME['ep']['delete_contact']['uri'], Endpoints::API_ME['ep']['delete_contact']['action']);

        // Contacts properties
        Route::put(Endpoints::API_CONTACT['ep']['work']['uri'], Endpoints::API_CONTACT['ep']['work']['action']);
        Route::put(Endpoints::API_CONTACT['ep']['food']['uri'], Endpoints::API_CONTACT['ep']['food']['action']);
        Route::put(Endpoints::API_CONTACT['ep']['introduction']['uri'], Endpoints::API_CONTACT['ep']['introduction']['action']);

        // Genders
        Route::apiResource(Endpoints::API_GENDER['ep']['crud'], Endpoints::API_GENDER['class']);

        // Relationships
        Route::apiResource(Endpoints::API_RELATIONSHIP['ep']['crud'], Endpoints::API_RELATIONSHIP['class'], ['except' => ['index']])
            ->names(Endpoints::API_RELATIONSHIP['name']['crud']);

        Route::get(Endpoints::API_RELATIONSHIP['ep']['by_contact']['uri'], Endpoints::API_RELATIONSHIP['ep']['by_contact']['action'])
            ->name(Endpoints::API_RELATIONSHIP['name']['index']);

        // Sets tags
        Route::post(Endpoints::API_CONTACT_TAG['ep']['set_tags']['uri'], Endpoints::API_CONTACT_TAG['ep']['set_tags']['action']);
        Route::post(Endpoints::API_CONTACT_TAG['ep']['unset_tags']['uri'], Endpoints::API_CONTACT_TAG['ep']['unset_tags']['action']);
        Route::post(Endpoints::API_CONTACT_TAG['ep']['unset_tag']['uri'], Endpoints::API_CONTACT_TAG['ep']['unset_tag']['action']);

        // Places
        Route::apiResource(Endpoints::API_PLACE['ep']['crud'], Endpoints::API_PLACE['class']);

        // Addresses
        Route::apiResource(Endpoints::API_ADDRESS['ep']['crud'], Endpoints::API_ADDRESS['class'])
            ->names(Endpoints::API_ADDRESS['name']);

        Route::get(Endpoints::API_ADDRESS['ep']['addresses']['uri'], Endpoints::API_ADDRESS['ep']['addresses']['action']);

        // Contact Fields
        Route::apiResource(Endpoints::API_CONTACT_FIELD['ep']['crud'], Endpoints::API_CONTACT_FIELD['class'], ['except' => ['index']]);
        Route::get(Endpoints::API_CONTACT_FIELD['ep']['contactfields']['uri'], Endpoints::API_CONTACT_FIELD['ep']['contactfields']['action']);

        // Pets
        Route::apiResource(Endpoints::API_PET['ep']['crud'], Endpoints::API_PET['class']);
        Route::get(Endpoints::API_PET['ep']['pets']['uri'], Endpoints::API_PET['ep']['pets']['action']);

        // Tags
        Route::apiResource(Endpoints::API_TAG['ep']['crud'], Endpoints::API_TAG['class']);
        Route::get(Endpoints::API_TAG['ep']['contacts']['uri'], Endpoints::API_TAG['ep']['contacts']['action']);

        // Companies
        Route::apiResource(Endpoints::API_COMPANY['ep']['crud'], Endpoints::API_COMPANY['class']);

        // Occupations
        Route::apiResource(Endpoints::API_OCCUPATION['ep']['crud'], Endpoints::API_OCCUPATION['class']);

        // Notes
        Route::apiResource(Endpoints::API_NOTE['ep']['crud'], Endpoints::API_NOTE['class'])
            ->names(Endpoints::API_NOTE['name']);

        Route::get(Endpoints::API_NOTE['ep']['notes']['uri'], Endpoints::API_NOTE['ep']['notes']['action']);

        // Calls
        Route::apiResource(Endpoints::API_CALL['ep']['crud'], Endpoints::API_CALL['class'])
            ->names(Endpoints::API_CALL['name']);
        Route::get(Endpoints::API_CALL['ep']['calls']['uri'], Endpoints::API_CALL['ep']['calls']['action']);

        // Conversations
        Route::apiResource(Endpoints::API_CONVERSATION['ep']['crud'], Endpoints::API_CONVERSATION['class'])
            ->names(Endpoints::API_CONVERSATION['name']);
        Route::get(Endpoints::API_CONVERSATION['ep']['conversations']['uri'], Endpoints::API_CONVERSATION['ep']['conversations']['action']);

        // Messages
        Route::apiResource(Endpoints::API_MESSAGE['ep']['crud'], Endpoints::API_MESSAGE['class'], ['except' => ['index', 'show']]);

        // Activities
        Route::apiResource(Endpoints::API_ACTIVITY['ep']['crud'], Endpoints::API_ACTIVITY['class'])
            ->names(Endpoints::API_ACTIVITY['name']);
        Route::get(Endpoints::API_ACTIVITY['ep']['activities']['uri'], Endpoints::API_ACTIVITY['ep']['activities']['action']);

        // Reminders
        Route::apiResource(Endpoints::API_REMINDER['ep']['crud'], Endpoints::API_REMINDER['class'])
            ->names(Endpoints::API_REMINDER['name']);
        Route::get(Endpoints::API_REMINDER['ep']['upcoming']['uri'], Endpoints::API_REMINDER['ep']['upcoming']['action']);
        Route::get(Endpoints::API_REMINDER['ep']['reminders']['uri'], Endpoints::API_REMINDER['ep']['reminders']['action']);

        // Tasks
        Route::apiResource(Endpoints::API_TASK['ep']['crud'], Endpoints::API_TASK['class']);
        Route::get(Endpoints::API_TASK['ep']['tasks']['uri'], Endpoints::API_TASK['ep']['tasks']['action']);

        // Gifts
        Route::apiResource(Endpoints::API_GIFT['ep']['crud'], Endpoints::API_GIFT['class']);
        Route::get(Endpoints::API_GIFT['ep']['gifts']['uri'], Endpoints::API_GIFT['ep']['gifts']['action']);
        Route::put(Endpoints::API_GIFT['ep']['photo']['uri'], Endpoints::API_GIFT['ep']['photo']['action']);

        // Debts
        Route::apiResource(Endpoints::API_DEBT['ep']['crud'], Endpoints::API_DEBT['class']);
        Route::get(Endpoints::API_DEBT['ep']['debts']['uri'], Endpoints::API_DEBT['ep']['debts']['action']);

        // Journal
        Route::apiResource(Endpoints::API_JOURNAL['ep']['crud'], Endpoints::API_JOURNAL['class'])
            ->names(Endpoints::API_JOURNAL['name']);

        // Activity Types
        Route::apiResource(Endpoints::API_ACTIVITY_TYPES['ep']['crud'], Endpoints::API_ACTIVITY_TYPES['class']);

        // Activity Type Categories
        Route::apiResource(Endpoints::API_ACTIVITY_TYPE_CATEGORY['ep']['crud'], Endpoints::API_ACTIVITY_TYPE_CATEGORY['class']);

        // Relationship Type Groups
        Route::apiResource(Endpoints::API_RELATIONSHIP_TYPE_GROUP['ep']['crud'], Endpoints::API_RELATIONSHIP_TYPE_GROUP['class'], ['only' => ['index', 'show']]);

        // Relationship Types
        Route::apiResource(Endpoints::API_RELATIONSHIP_TYPE['ep']['crud'], Endpoints::API_RELATIONSHIP_TYPE['class'], ['only' => ['index', 'show']]);

        // Life events
        Route::apiResource(Endpoints::API_LIFE_EVENT['ep']['crud'], Endpoints::API_LIFE_EVENT['class']);

        // Documents
        Route::apiResource(Endpoints::API_DOCUMENT['ep']['crud'], Endpoints::API_DOCUMENT['class'], ['except' => ['update']])
            ->names(Endpoints::API_DOCUMENT['name']);
        Route::get(Endpoints::API_DOCUMENT['ep']['documents']['uri'], Endpoints::API_DOCUMENT['ep']['documents']['action']);

        // Photos
        Route::apiResource(Endpoints::API_PHOTO['ep']['crud'], Endpoints::API_PHOTO['class'], ['except' => ['update']])
            ->names(Endpoints::API_PHOTO['name']);
        Route::get(Endpoints::API_PHOTO['ep']['photos']['uri'], Endpoints::API_PHOTO['ep']['photos']['action']);

        // Avatars
        Route::put(Endpoints::API_AVATAR['ep']['avatar']['uri'], Endpoints::API_AVATAR['ep']['avatar']['action']);

        // Contact logs
        Route::get(Endpoints::API_LOG['ep']['logs']['uri'], Endpoints::API_LOG['ep']['logs']['action']);

        /*
         * SETTINGS
         */
        Route::apiResource(Endpoints::API_CONTACT_FIELD_TYPE['ep']['crud'], Endpoints::API_CONTACT_FIELD_TYPE['class']);
        Route::apiResource(Endpoints::API_LOG_SETTING['ep']['crud'], Endpoints::API_LOG_SETTING['class']);

        /*
         * MISC
         */
        Route::get(Endpoints::API_COUNTRIES['ep']['countries']['uri'], Endpoints::API_COUNTRIES['ep']['countries']['action'])
            ->name( Endpoints::API_COUNTRIES['name']);
    });
});
