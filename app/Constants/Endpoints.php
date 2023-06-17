<?php

namespace App\Constants;

use App\Http\Controllers\Api\{
    Account\Activity\ApiActivityTypeCategoryController,
    Account\Activity\ApiActivityTypeController,
    Account\ApiCompanyController,
    Account\ApiGenderController,
    Account\ApiPlaceController,
    Account\ApiUserController,
    ApiActivitiesController,
    ApiContactController,
    ApiContactFieldController,
    ApiContactTagController,
    ApiController,
    ApiDebtController,
    ApiGiftController,
    ApiJournalController,
    ApiMeController,
    ApiNoteController,
    ApiPetController,
    ApiRelationshipController,
    ApiRelationshipTypeController,
    ApiRelationshipTypeGroupController,
    ApiReminderController,
    ApiTagController,
    ApiTaskController,
    Contact\ApiAddressController,
    Contact\ApiAuditLogController,
    Contact\ApiAvatarController,
    Contact\ApiCallController,
    Contact\ApiConversationController,
    Contact\ApiDocumentController,
    Contact\ApiLifeEventController,
    Contact\ApiMessageController,
    Contact\ApiOccupationController,
    Contact\ApiPhotoController,
    Misc\ApiCountryController,
    Settings\ApiComplianceController,
    Settings\ApiContactFieldTypeController,
    Settings\ApiCurrencyController,
    Settings\ApiAuditLogController as ApiSettingLogController,
    Statistics\ApiStatisticsController,
};

abstract class Endpoints
{
    private const API_CONTROLLERS = [
        'api_statics' => ApiStatisticsController::class,
        'api_compliance' => ApiComplianceController::class,
        'api_currency' => ApiCurrencyController::class,
        'api' => ApiController::class,
        'api_user' => ApiUserController::class,
        'api_contact' => ApiContactController::class,
        'api_me' => ApiMeController::class,
        'api_gender' => ApiGenderController::class,
        'api_relationship' => ApiRelationshipController::class,
        'api_contact_tag' => ApiContactTagController::class,
        'api_place' => ApiPlaceController::class,
        'api_address' => ApiAddressController::class,
        'api_contact_field' => ApiContactFieldController::class,
        'api_pet' => ApiPetController::class,
        'api_tag' => ApiTagController::class,
        'api_company' => ApiCompanyController::class,
        'api_occupation' => ApiOccupationController::class,
        'api_note' => ApiNoteController::class,
        'api_call' => ApiCallController::class,
        'api_conversation' => ApiConversationController::class,
        'api_message' => ApiMessageController::class,
        'api_activity' => ApiActivitiesController::class,
        'api_reminder' => ApiReminderController::class,
        'api_task' => ApiTaskController::class,
        'api_gift' => ApiGiftController::class,
        'api_debt' => ApiDebtController::class,
        'api_journal' => ApiJournalController::class,
        'api_activity_type' => ApiActivityTypeController::class,
        'api_activity_type_category' => ApiActivityTypeCategoryController::class,
        'api_relationship_type_group' => ApiRelationshipTypeGroupController::class,
        'api_relationship_type' => ApiRelationshipTypeController::class,
        'api_life_event' => ApiLifeEventController::class,
        'api_document' => ApiDocumentController::class,
        'api_photo' => ApiPhotoController::class,
        'api_avatar' => ApiAvatarController::class,
        'api_log' => ApiAuditLogController::class,
        'api_contact_field_type' => ApiContactFieldTypeController::class,
        'api_log_setting' => ApiSettingLogController::class,
        'api_countries' => ApiCountryController::class,
    ];

    // API

    public const API_STATISTICS = [
        'description' => 'crud of api statics',
        'name' => 'api.statistics',
        'class' => self::API_CONTROLLERS['api_statics'],
        // endpoints: modify array value as if the endpoint needs to be changed
        'ep' => [
            'crud' => 'statistics',
        ],
    ];

    public const API_COMPLIANCE = [
        'description' => 'crud of api compliance',
        'name' => 'api.compliance', // not used
        'class' => self::API_CONTROLLERS['api_compliance'],
        'ep' => [
            'crud' => 'compliance',
        ],
    ];

    public const API_CURRENCY = [
        'description' => 'crud of api currency',
        'name' => 'api.currencies',
        'class' => self::API_CONTROLLERS['api_currency'],
        'ep' => [
            'crud' => 'currencies',
        ],
    ];

    public const API = [
        'description' => 'handle api success process',
        'name' => 'api',
        'class' => self::API_CONTROLLERS['api'],
        'ep' => [
            'success' => [
                'uri' => '/',
                'action' => [self::API_CONTROLLERS['api'], 'success'],
            ],
        ],
    ];

    public const API_USER = [
        'description' => 'handle compliance of logged-in user of api user',
        'name' => 'api.user', // not used
        'class' => self::API_CONTROLLERS['api_user'],
        'ep' => [
            'me' => [
                'uri' => '/me',
                'action' => [self::API_CONTROLLERS['api_user'], 'show'],
            ],
            'compliance' => [
                'uri' => '/me/compliance',
                'action' => [self::API_CONTROLLERS['api_user'], 'getSignedPolicies'],
            ],
            'compliance_by_id' => [
                'uri' => '/me/compliance/{id}',
                'action' => [self::API_CONTROLLERS['api_user'], 'get'],
            ],
            'set_compliance' => [
                'uri' => '/me/compliance',
                'action' => [self::API_CONTROLLERS['api_user'], 'set'],
            ],
        ],
    ];

    public const API_CONTACT = [
        'description' => 'crud of api contacts, and methods of career,food preferences, and how you met the contact',
        'name' => ['index' => 'contacts', 'show' => 'contact'], //only used for api-resource
        'class' => self::API_CONTROLLERS['api_contact'],
        'ep' => [
            'crud' => 'contacts',
            'work' => [
                'uri' => '/contacts/{contact}/work',
                'action' => [self::API_CONTROLLERS['api_contact'], 'updateWork'],
            ],
            'food' => [
                'uri' => '/contacts/{contact}/food',
                'action' => [self::API_CONTROLLERS['api_contact'], 'updateFoodPreferences'],
            ],
            'introduction' => [
                'uri' => '/contacts/{contact}/introduction',
                'action' => [self::API_CONTROLLERS['api_contact'], 'updateIntroduction'],
            ],
        ],
    ];

    public const API_ME = [
        'description' => 'Set and Remove contact as "me"',
        'name' => 'api.me', // not used
        'class' => self::API_CONTROLLERS['api_me'],
        'ep' => [
            'create_contact' => [
                'uri' => '/me/contact',
                'action' => [self::API_CONTROLLERS['api_me'], 'store'],
            ],
            'delete_contact' => [
                'uri' => '/me/contact',
                'action' => [self::API_CONTROLLERS['api_me'], 'destroy'],
            ],
        ],
    ];

    public const API_GENDER = [
        'description' => 'crud of api gender',
        'name' => 'api.gender', // not used
        'class' => self::API_CONTROLLERS['api_gender'],
        'ep' => [
            'crud' => 'genders',
        ],
    ];

    public const API_RELATIONSHIP = [
        'description' => 'crud of api relationship',
        'name' => [
            'crud' => ['show' => 'relationship'],
            'index' => 'relationships',
        ],
        'class' => self::API_CONTROLLERS['api_relationship'],
        'ep' => [
            'crud' => 'relationships',
            'by_contact' => [
                'uri' => '/contacts/{contact}/relationships',
                'action' => [self::API_CONTROLLERS['api_relationship'], 'index'],
            ],
        ],
    ];

    public const API_CONTACT_TAG = [
        'description' => 'set and unset contact tags, and unset contact single tag',
        'name' => 'api.contact.tag.', // not used
        'class' => self::API_CONTROLLERS['api_contact_tag'],
        'ep' => [
            'set_tags' => [
                'uri' => '/contacts/{contact}/setTags',
                'action' => [self::API_CONTROLLERS['api_contact_tag'], 'setTags'],
            ],
            'unset_tags' => [
                'uri' => '/contacts/{contact}/unsetTags',
                'action' => [self::API_CONTROLLERS['api_contact_tag'], 'unsetTags'],
            ],
            'unset_tag' => [
                'uri' => '/contacts/{contact}/unsetTag',
                'action' => [self::API_CONTROLLERS['api_contact_tag'], 'unsetTag'],
            ],
        ],
    ];

    public const API_PLACE = [
        'description' => 'crud of api places',
        'name' => 'api.places.', // not used
        'class' => self::API_CONTROLLERS['api_place'],
        'ep' => [
            'crud' => 'places',
        ],
    ];

    public const API_ADDRESS = [
        'description' => 'crud of api addresses',
        'name' => ['index' => 'addresses', 'show' => 'address'],
        'class' => self::API_CONTROLLERS['api_address'],
        'ep' => [
            'crud' => 'addresses',
            'addresses' => [
                'uri' => '/contacts/{contact}/addresses',
                'action' => [self::API_CONTROLLERS['api_address'], 'addresses'],
            ],
        ],
    ];

    public const API_CONTACT_FIELD = [
        'description' => 'crud of api contact field',
        'name' => 'api.contact.field', // not used
        'class' => self::API_CONTROLLERS['api_contact_field'],
        'ep' => [
            'crud' => 'contactfields',
            'contactfields' => [
                'uri' => '/contacts/{contact}/contactfields',
                'action' => [self::API_CONTROLLERS['api_contact_field'], 'contactFields'],
            ],
        ],
    ];

    public const API_PET = [
        'description' => 'crud of api pet',
        'name' => 'api.pet', // not used
        'class' => self::API_CONTROLLERS['api_pet'],
        'ep' => [
            'crud' => 'pets',
            'pets' => [
                'uri' => '/contacts/{contact}/pets',
                'action' => [self::API_CONTROLLERS['api_pet'], 'pets'],
            ],
        ],
    ];

    public const API_TAG = [
        'description' => 'crud of api tag',
        'name' => 'api.tag', // not used
        'class' => self::API_CONTROLLERS['api_tag'],
        'ep' => [
            'crud' => 'tags',
            'contacts' => [
                'uri' => '/tags/{tag}/contacts',
                'action' => [self::API_CONTROLLERS['api_tag'], 'contacts'],
            ],
        ],
    ];

    public const API_COMPANY = [
        'description' => 'crud of api company',
        'name' => 'api.company', // not used
        'class' => self::API_CONTROLLERS['api_company'],
        'ep' => [
            'crud' => 'companies',
        ],
    ];

    public const API_OCCUPATION = [
        'description' => 'crud of api occupation',
        'name' => 'api.occupation', // not used
        'class' => self::API_CONTROLLERS['api_occupation'],
        'ep' => [
            'crud' => 'occupations',
        ],
    ];

    public const API_NOTE = [
        'description' => 'crud of api note',
        'name' => ['index' => 'notes', 'show' => 'note'],
        'class' => self::API_CONTROLLERS['api_note'],
        'ep' => [
            'crud' => 'notes',
            'notes' => [
                'uri' => '/contacts/{contact}/notes',
                'action' => [self::API_CONTROLLERS['api_note'], 'notes'],
            ],
        ],
    ];

    public const API_CALL = [
        'description' => 'crud of api call',
        'name' => ['index' => 'calls', 'show' => 'call'],
        'class' => self::API_CONTROLLERS['api_call'],
        'ep' => [
            'crud' => 'calls',
            'calls' => [
                'uri' => '/contacts/{contact}/calls',
                'action' => [self::API_CONTROLLERS['api_call'], 'calls'],
            ],
        ],
    ];

    public const API_CONVERSATION = [
        'description' => 'crud of api conversation',
        'name' => ['index' => 'conversations', 'show' => 'conversation'],
        'class' => self::API_CONTROLLERS['api_conversation'],
        'ep' => [
            'crud' => 'conversations',
            'conversations' => [
                'uri' => '/contacts/{contact}/conversations',
                'action' => [self::API_CONTROLLERS['api_conversation'], 'conversations'],
            ],
        ],
    ];

    public const API_MESSAGE = [
        'description' => 'crud of api message',
        'name' => 'api.message',
        'class' => self::API_CONTROLLERS['api_message'],
        'ep' => [
            'crud' => 'conversations/{conversation}/messages',
        ],
    ];

    public const API_ACTIVITY = [
        'description' => 'crud of api activity',
        'name' => ['index' => 'activities', 'show' => 'activity'],
        'class' => self::API_CONTROLLERS['api_activity'],
        'ep' => [
            'crud' => 'activities',
            'activities' => [
                'uri' => '/contacts/{contact}/activities',
                'action' => [self::API_CONTROLLERS['api_activity'], 'activities'],
            ],
        ],
    ];

    public const API_REMINDER = [
        'description' => 'crud of api reminder',
        'name' => ['index' => 'reminders'],
        'class' => self::API_CONTROLLERS['api_reminder'],
        'ep' => [
            'crud' => 'reminders',
            'upcoming' => [
                'uri' => 'reminders/upcoming/{month}',
                'action' => [self::API_CONTROLLERS['api_reminder'], 'upcoming'],
            ],
            'reminders' => [
                'uri' => '/contacts/{contact}/reminders',
                'action' => [self::API_CONTROLLERS['api_reminder'], 'reminders'],
            ],
        ],
    ];

    public const API_TASK = [
        'description' => 'crud of api task',
        'name' => 'api.task', // not used
        'class' => self::API_CONTROLLERS['api_task'],
        'ep' => [
            'crud' => 'tasks',
            'tasks' => [
                'uri' => '/contacts/{contact}/tasks',
                'action' => [self::API_CONTROLLERS['api_task'], 'tasks'],
            ],
        ],
    ];

    public const API_GIFT = [
        'description' => 'crud of api gift',
        'name' => 'api.gift', // not used
        'class' => self::API_CONTROLLERS['api_gift'],
        'ep' => [
            'crud' => 'gifts',
            'gifts' => [
                'uri' => '/contacts/{contact}/gifts',
                'action' => [self::API_CONTROLLERS['api_gift'], 'gifts'],
            ],
            'photo' => [
                'uri' => '/gifts/{gift}/photo/{photo}',
                'action' => [self::API_CONTROLLERS['api_gift'], 'associate'],
            ],
        ],
    ];

    public const API_DEBT = [
        'description' => 'crud of api debt',
        'name' => 'api.debt', // not used
        'class' => self::API_CONTROLLERS['api_debt'],
        'ep' => [
            'crud' => 'debts',
            'debts' => [
                'uri' => '/contacts/{contact}/debts',
                'action' => [self::API_CONTROLLERS['api_debt'], 'debts'],
            ],
        ],
    ];

    public const API_JOURNAL = [
        'description' => 'crud of api journal',
        'name' => ['index' => 'journal', 'show' => 'entry'],
        'class' => self::API_CONTROLLERS['api_journal'],
        'ep' => [
            'crud' => 'journal',
        ],
    ];

    public const API_ACTIVITY_TYPES = [
        'description' => 'crud of api activity types',
        'name' => 'api.activity.type', // not used
        'class' => self::API_CONTROLLERS['api_activity_type'],
        'ep' => [
            'crud' => 'activitytypes',
        ],
    ];

    public const API_ACTIVITY_TYPE_CATEGORY = [
        'description' => 'crud of api activity type categories',
        'name' => 'api.activity.type.category', // not used
        'class' => self::API_CONTROLLERS['api_activity_type_category'],
        'ep' => [
            'crud' => 'activitytypecategories',
        ],
    ];

    public const API_RELATIONSHIP_TYPE_GROUP = [
        'description' => 'crud of api relationship type group',
        'name' => 'api.relationship.type.group', // not used
        'class' => self::API_CONTROLLERS['api_relationship_type_group'],
        'ep' => [
            'crud' => 'relationshiptypegroups',
        ],
    ];

    public const API_RELATIONSHIP_TYPE = [
        'description' => 'crud of api relationship type',
        'name' => 'api.relationship.type', // not used
        'class' => self::API_CONTROLLERS['api_relationship_type'],
        'ep' => [
            'crud' => 'relationshiptypes',
        ],
    ];

    public const API_LIFE_EVENT = [
        'description' => 'crud of api life event',
        'name' => 'api.life.event', // not used
        'class' => self::API_CONTROLLERS['api_life_event'],
        'ep' => [
            'crud' => 'lifeevents',
        ],
    ];

    public const API_DOCUMENT = [
        'description' => 'crud of api document',
        'name' => ['index' => 'documents', 'show' => 'document'],
        'class' => self::API_CONTROLLERS['api_document'],
        'ep' => [
            'crud' => 'documents',
            'documents' => [
                'uri' => '/contacts/{contact}/documents',
                'action' => [self::API_CONTROLLERS['api_document'], 'contact'],
            ],
        ],
    ];

    public const API_PHOTO = [
        'description' => 'crud of api photo',
        'name' => ['index' => 'photos', 'show' => 'photo'],
        'class' => self::API_CONTROLLERS['api_photo'],
        'ep' => [
            'crud' => 'photos',
            'photos' => [
                'uri' => '/contacts/{contact}/photos',
                'action' => [self::API_CONTROLLERS['api_photo'], 'contact'],
            ],
        ],
    ];

    public const API_AVATAR = [
        'description' => 'update of api contact avatar',
        'name' => 'api.avatar', // not used
        'class' => self::API_CONTROLLERS['api_avatar'],
        'ep' => [
            'avatar' => [
                'uri' => '/contacts/{contact}/avatar',
                'action' => [self::API_CONTROLLERS['api_avatar'], 'update'],
            ],
        ],
    ];

    public const API_LOG = [
        'description' => 'read of api contact logs',
        'name' => 'api.logs', // not used
        'class' => self::API_CONTROLLERS['api_log'],
        'ep' => [
            'logs' => [
                'uri' => '/contacts/{contact}/logs',
                'action' => [self::API_CONTROLLERS['api_log'], 'index'],
            ],
        ],
    ];

    public const API_CONTACT_FIELD_TYPE = [
        'description' => 'crud of api contact field type',
        'name' => 'api.contact.field.type', // not used
        'class' => self::API_CONTROLLERS['api_contact_field_type'],
        'ep' => [
            'crud' => 'contactfieldtypes',
        ],
    ];

    public const API_LOG_SETTING = [
        'description' => 'crud of api setting logs',
        'name' => 'api.setting.logs', // not used
        'class' => self::API_CONTROLLERS['api_log_setting'],
        'ep' => [
            'crud' => 'logs',
        ],
    ];

    public const API_COUNTRIES = [
        'description' => 'read of api countries',
        'name' => 'countries',
        'class' => self::API_CONTROLLERS['api_countries'],
        'ep' => [
            'countries' => [
                'uri' => '/countries',
                'action' => [self::API_CONTROLLERS['api_countries'], 'index'],
            ],
        ],
    ];

    // WEB
}
