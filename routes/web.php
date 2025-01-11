<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\AgentSearchController;
use App\Http\Controllers\Api\AgentLeadController;
use App\Http\Controllers\Api\XmlFeedController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BetaAgentController;
use App\Http\Controllers\BetaDeveloperController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\CompanyXmlFeedsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\DevelopmentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MiscellaneousController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ProfileSetupController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PropertyLeadController;
use App\Http\Controllers\PropertySearchController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\TeamManagementController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserFileFoldersController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

$appMode = env('APP_MODE');



$guestRoutes = function(){
    Route::get('/', [AuthController::class, 'login'])->name('user.home');
    Route::get('/developers', [BetaDeveloperController::class, 'landingDevelopers'])->name('developers');
    Route::post('/developers', [BetaDeveloperController::class, 'store'])->name('store.developers');
    Route::get('/login', [AuthController::class, 'login'])->name('user.login');
    Route::post('/login', [AuthController::class, 'postLogin'])->name('user.postLogin');

    Route::get('/login/google', [SocialController::class, 'redirectToGoogle'])->name('user.login.google');
    Route::get('/oauth/callback/google', [SocialController::class, 'handleGoogleCallback']);

    Route::get('/login/twitter', [SocialController::class, 'redirectToTwitter'])->name('user.login.twitter');
    Route::get('/oauth/callback/twitter', [SocialController::class, 'handleTwitterCallback']);

    Route::get('/register', [AuthController::class,'register'])->name('user.register');
    Route::post('/register', [AuthController::class,'postRegister'])->name('user.postRegister');

    Route::get('/forgot-password', [AuthController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'reset'])->name('forgot.password');
    Route::get('/forgot-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/email', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');

    Route::get('/verify-email/{token}', [AuthController::class, 'verifyEmail'])
    ->name('user.verifyEmail');
    

};
if($appMode == 'local'){
    // Guest Routes
    Route::middleware(['GuestMiddleware'])->group($guestRoutes);

}elseif($appMode == 'staging'){
    // Guest Routes
    Route::domain('www.staging.inmoconnect.com')->middleware(['GuestMiddleware'])->group($guestRoutes);

}elseif($appMode == 'p4staging'){
    // Guest Routes
    Route::domain('www.p4staging.inmoconnect.com')->middleware(['GuestMiddleware'])->group($guestRoutes);

}elseif($appMode == 'production'){
    // Guest Routes
    Route::domain('www.dashboard.inmoconnect.com')->middleware(['GuestMiddleware'])->group($guestRoutes);

}
//Language Switching Route
Route::middleware(['GuestMiddleware'])->get('lang/{locale}', [LocalizationController::class, 'setLocale'])->name('user.setLocale');


$commonRoutes = function() {

    Route::get('/get-countries', [MiscellaneousController::class, 'getCountries'])->name('user.getCountries');
    Route::get('/get-states', [MiscellaneousController::class, 'getStates'])->name('user.getStates');
};

if($appMode == 'local'){
    $commonRoutes();
}elseif($appMode == 'staging'){
    Route::domain('www.staging.inmoconnect.com')->group($commonRoutes);
}elseif($appMode == 'p4staging'){
    Route::domain('www.p4staging.inmoconnect.com')->group($commonRoutes);
}elseif($appMode == 'production'){
    Route::domain('www.dashboard.inmoconnect.com')->group($commonRoutes);
}

$crmRoutes = function(){


    Route::middleware('ProfileSetupMiddleware')->group(function() {
        // Route::get('/dashboard',[DashboardController::class, 'index'])->name('user.dashboard');
        Route::match(['get', 'post'],'/dashboard',[DashboardController::class, 'index'])->name('user.dashboard');
        Route::post('/load-properties-data',[DashboardController::class, 'loadPropertiesData'])->name('user.loadPropertiesData');
        Route::post('/load-agents-data',[DashboardController::class, 'loadAgentManagementData'])->name('user.loadAgentManagementData');
        Route::match(['get', 'post'], '/profile', [DashboardController::class, 'profile'])->name('user.profile');
        Route::match(['get', 'post'], '/profile-edit', [DashboardController::class, 'ViewAgentProfile'])->name('user.profile-edit');
        Route::match(['get', 'post'], '/profile-tab-1', [DashboardController::class, 'profileTab1'])->name('user.profileTab1');
        Route::match(['get', 'post'], '/profile-tab-2', [DashboardController::class, 'profileTab2'])->name('user.profileTab2');
        Route::match(['get', 'post'], '/change-password', [DashboardController::class, 'changePassword'])->name('user.changePassword');
        Route::get('remove-event-attachement/{id}', [DashboardController::class, 'removeEventAttachement'])->name('user.removeEventAttachement');
        Route::match(['get', 'post'], '/company-details', [DashboardController::class, 'companyDetails'])->name('user.company-details');
        Route::match(['get', 'post'], '/view-company', [DashboardController::class, 'ViewCompanyProfile'])->name('user.view-company');

        // xml feed related routes
        Route::post('/XmlFeeds-Assisted', [CompanyXmlFeedsController::class, 'XmlFeedsAssisted'])->name('XmlFeedsAssisted');
        Route::post('/xmlfeedsrun', [CompanyXmlFeedsController::class, 'xmlFeedsRun'])->name('xmlFeedsRun');
        Route::get('/xmlfeedsrun', [CompanyXmlFeedsController::class, 'FeedSyncedIndex'])->name('feed-synced-index');
        Route::match(['get', 'post'],'/xml-feeds-import',[CompanyXmlFeedsController::class,'Xmluploads'])->name('xml-uploads');
        Route::get('/import-progress',[CompanyXmlFeedsController::class,'importProgress'])->name('importProgress');
        Route::match(['get', 'post'],'/xmlfeed/assign-development',[CompanyXmlFeedsController::class,'assignDevelopmentIndex'])->name('developer.assigndevelopment');
        Route::post('/xmlfeed/assign-feedproperties-developmrnt',[CompanyXmlFeedsController::class,'propertyAssignToDevelopment'])->name('developer.propertyAssignToDevelopment');
        Route::match(['get', 'post'],'/xml-feeds-import-test',[CompanyXmlFeedsController::class,'XmluploadsTest'])->name('test-xml-uploads');



        Route::post('dashboard/load-current-event',[DashboardController::class, 'loadCurrentEvent'])->name('user.loadCurrentEvent');
        Route::post('dashboard/user-company-single-tasks',[DashboardController::class, 'saveSingleTaskData'])->name('user.saveSingleTaskData');
        Route::post('dashboard/user-company-tasks',[DashboardController::class, 'fetchUserCompanyTasks'])->name('user.fetchUserCompanyTasks');
        Route::get('dashboard/delete-user-company-task/{id}',[DashboardController::class, 'deleteUserCompanyTask'])->name('user.deleteUserCompanyTask');
        Route::post('dashboard/update-task-status',[DashboardController::class, 'updateTaskStatus'])->name('user.updateTaskStatus');
        Route::post('dashboard/add-assign-todo-list',[DashboardController::class, 'addAssignToDoList'])->name('user.addAssignToDoList');


        //Properties Routes
        Route::match(['get', 'post'],'/properties', [PropertyController::class, 'index'])->name('properties.index');
        Route::get('/properties/search', [PropertySearchController::class, 'index'])->name('propertySearch.index');
        Route::get('/properties/advance_search', [PropertySearchController::class, 'advanceSearchproPerties'])->name('properties.advance_search');
        Route::post('/properties/advance_search', [PropertySearchController::class, 'advanceSearchproPertiesSave'])->name('properties.advance_search.save');
        Route::post('/properties/search', [PropertySearchController::class, 'searchProperties'])->name('properties.advance_search.index');


        Route::get('/properties/search-results', [PropertySearchController::class, 'searchProperties'])->name('properties.searchProperties');
        Route::post('/properties/submit-property-search', [PropertySearchController::class, 'submitPropertySearch'])->name('properties.submitPropertySearch');
        Route::get('/properties/search/{savedSearchId?}', [PropertySearchController::class, 'searchProperties'])->name('properties.advance_search.index');
        Route::match(['get', 'post'],'/properties/properties-lead', [PropertyLeadController::class, 'propertiesLead'])->name('properties.lead.index');
        Route::get('properties/search/view/{reference}', [PropertyController::class, 'newPropertyShow'])->name('properties.search.show');
        Route::get('/properties/saved-search/delete/{id}', [PropertySearchController::class, 'deleteSavedSearch'])->name('properties.deleteSavedSearch');
        Route::get('/properties/saved-search/notifiable-update/{id}', [PropertySearchController::class, 'isNotificableUpdate'])->name('properties.isNotificableUpdate');
        Route::get('/properties/saved-search-data', [PropertySearchController::class, 'saveSearchProperty'])->name('properties.save_search_data');
        Route::get('/properties/create', [PropertyController::class, 'createNewPropertyPage'])->name('properties.create');
        Route::get('/properties/edit/{reference?}', [PropertyController::class, 'create'])->name('properties.edit');
        Route::post('/properties/store/{id?}', [PropertyController::class, 'newPropertyStore'])->name('properties.store');
        Route::get('properties/view/{reference}', [PropertyController::class, 'newPropertyShow'])->name('properties.show');
        Route::get('messages/view/{reference}', [PropertyController::class, 'newPropertyShow'])->name('messages.show');
        Route::get('/get-agent-details/{id}', [PropertyController::class, 'getAgentDetails'])->name('properties.getAgentDetails');
        Route::get('/properties/delete/{id}', [PropertyController::class, 'destroy'])->name('properties.destroy');
        Route::get('/properties/add_property/{propertyId}', [PropertySearchController::class, 'addProperty'])->name('properties.add_property');
        Route::post('properties/upload-documents/{propertyId?}', [PropertyController::class, 'uploadDocuments'])->name('properties.uploadDocuments');
        Route::get('properties/remove-document/{id}', [PropertyController::class, 'removeDocument'])->name('properties.removeDocument');
        Route::get('properties/remove-property-attachement/{id}', [PropertyController::class, 'removePropertyAttachement'])->name('properties.removePropertyAttachement');
        Route::post('properties/store-inquirey', [PropertyLeadController::class, 'storePropertyInquirey'])->name('properties.storeInquirey');
        Route::get('properties/getLeadDetails/{id}', [PropertyLeadController::class, 'getLeadDetails'])->name('properties.getLeadDetails');
            // new property page design
        Route::get('/properties/create-new', [PropertyController::class, 'createNewPropertyPage'])->name('properties.createNewPropertyPage');
        // Route::post('/properties/store/{id?}', [PropertyController::class, 'newPropertyStore'])->name('properties.new.store');
        Route::get('/properties/edit-new/{reference?}', [PropertyController::class, 'createNewPropertyPage'])->name('properties.edit.new');
        Route::get('new-properties/view/{reference}', [PropertyController::class, 'newPropertyShow'])->name('new.properties.show');
        Route::get('/fetch-subtypes/{typeId}', [PropertyController::class, 'fetchSubtypes'])->name('properties.subtype');
        Route::get('/fetch-commercial-subtypes', [PropertyController::class, 'getCommercialSubtypes'])->name('getCommercialSubtypes');



        //Projects Routes
        Route::match(['get', 'post'],'/projects', [ProjectController::class, 'index'])->name('projects.index');
        Route::post('projects/store/{id?}', [ProjectController::class, 'store'])->name('projects.store');
        Route::get('projects/show/{slug}', [ProjectController::class, 'show'])->name('projects.show');
        Route::get('projects/complete-project/{slug}', [ProjectController::class, 'completeProject'])->name('projects.completeProject');
        Route::post('projects/import-properties/{projectSlug}',[ProjectController::class, 'fetchImportProperties'])->name('projects.fetchImportProperties');
        Route::post('projects/project-properties/{projectSlug}',[ProjectController::class, 'fetchProjectProperties'])->name('projects.fetchProjectProperties');
        Route::get('projects/delete-project-property/{id}',[ProjectController::class, 'deleteProjectProperty'])->name('projects.deleteProjectProperty');
        Route::post('projects/save-import-properties/{projectSlug}',[ProjectController::class, 'submitImportProperties'])->name('projects.submitImportProperties');

        Route::post('projects/import-agents/{projectSlug}',[ProjectController::class, 'fetchImportAgents'])->name('projects.fetchImportAgents');
        Route::post('projects/manage-agents/{projectSlug}',[ProjectController::class, 'fetchImportAgents'])->name('projects.fetchManageAgents');
        Route::post('projects/fetch-agent-permissions/{projectSlug}',[ProjectController::class, 'fetchAgentPermissions'])->name('projects.fetchAgentPermissions');
        Route::post('projects/project-agents/{projectSlug}',[ProjectController::class, 'fetchProjectAgents'])->name('projects.fetchProjectAgents');
        Route::get('projects/delete-project-agent/{id}',[ProjectController::class, 'deleteProjectAgent'])->name('projects.deleteProjectAgent');
        Route::post('projects/save-import-agents/{projectSlug}',[ProjectController::class, 'submitImportAgents'])->name('projects.submitImportAgents');
        Route::post('projects/save-agent-permissions/{projectSlug}',[ProjectController::class, 'submitAgentPermissions'])->name('projects.submitAgentPermissions');

        Route::post('projects/import-customers/{projectSlug}',[ProjectController::class, 'fetchImportCustomers'])->name('projects.fetchImportCustomers');
        Route::post('projects/manage-customers/{projectSlug}',[ProjectController::class, 'fetchImportCustomers'])->name('projects.fetchManageCustomers');
        Route::post('projects/project-customers/{projectSlug}',[ProjectController::class, 'fetchProjectCustomers'])->name('projects.fetchProjectCustomers');
        Route::get('projects/delete-project-customer/{id}',[ProjectController::class, 'deleteProjectCustomer'])->name('projects.deleteProjectCustomer');
        Route::post('projects/save-import-customers/{projectSlug}',[ProjectController::class, 'submitImportCustomers'])->name('projects.submitImportCustomers');

        Route::post('projects/project-tasks/{projectSlug}',[ProjectController::class, 'fetchProjectTasks'])->name('projects.fetchProjectTasks');
        Route::post('projects/project-single-tasks/{projectSlug}',[ProjectController::class, 'saveSingleTaskData'])->name('projects.saveSingleTaskData');
        Route::get('projects/delete-project-task/{id}',[ProjectController::class, 'deleteProjectTask'])->name('projects.deleteProjectTask');
        Route::post('projects/save-task-data/{projectSlug}',[ProjectController::class, 'saveTaskData'])->name('projects.saveTaskData');
        Route::post('projects/update-task-status/{projectSlug}',[ProjectController::class, 'updateTaskStatus'])->name('projects.updateTaskStatus');


        Route::post('projects/project-attachments/{projectSlug}',[ProjectController::class, 'fetchProjectAttachments'])->name('projects.fetchProjectAttachments');
        Route::get('projects/download-project-attachment/{id}',[ProjectController::class, 'downloadProjectAttachment'])->name('projects.downloadProjectAttachment');
        Route::post('projects/save-attachment-data/{projectSlug}',[ProjectController::class, 'submitImportAttachments'])->name('projects.submitImportAttachments');


        Route::post('projects/remove-files',[ProjectController::class, 'removeFiles'])->name('project.removeFiles');
        Route::get('projects/delete/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');
        Route::post('projects/add-attachments',[ProjectController::class, 'addAttachments'])->name('projects.addAttachments');
        Route::get('remove-project-attachement/{id}',[ProjectController::class, 'removeProjectAttachement'])->name('projects.removeProjectAttachement');
        Route::post('projects/load-current-event',[ProjectController::class, 'loadCurrentEvent'])->name('projects.loadCurrentEvent');
        Route::get('projects/task_type/{task_id}',[ProjectController::class, 'projectsTaskType'])->name('projects.task_type');
        Route::post('projects/add-assign-todo-list',[ProjectController::class, 'addAssignToDoList'])->name('projects.addAssignToDoList');
        //Calender Routes
        Route::match(['get', 'post'],'/calender', [CalenderController::class, 'index'])->name('calender.index');

        //Customers Routes
        Route::match(['get', 'post'],'/customers', [CustomerController::class, 'index'])->name('customers.index');
        Route::post('/customers/invite', [CustomerController::class, 'invite'])->name('customers.invite');
        Route::post('/customers/update/{id}', [CustomerController::class, 'update'])->name('customers.update');
        Route::get('/customers/cancel-invite/{id}', [CustomerController::class, 'cancelInvite'])->name('customers.cancelInvite');
        Route::get('/customers/delete/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');
        Route::get('/export-customers', [CustomerController::class, 'exportCustomers'])->name('customers.exportCustomers');
        Route::get('/customers/load-edit-view/{id}', [CustomerController::class, 'loadEditView'])->name('customers.loadEditView');


        //Team Management Routes
        Route::match(['get', 'post'],'/team-management', [TeamManagementController::class, 'index'])->name('team_management.index');
        Route::post('/team-management/invite-team-member', [TeamManagementController::class, 'inviteTeamMember'])->name('team_management.inviteTeamMember');
        Route::post('/team-management/update-team-member/{id}', [TeamManagementController::class, 'updateTeamMember'])->name('team_management.updateTeamMember');
        Route::post('/team-management/submit-team-member-access-data', [TeamManagementController::class, 'submitTeamMemberAccessData'])->name('team_management.submitTeamMemberAccessData');
        Route::get('/team-management/delete/{id}', [TeamManagementController::class, 'destroy'])->name('team_management.destroy');
        Route::get('/team-management/load-edit-view/{id}', [TeamManagementController::class, 'loadEditView'])->name('team_management.loadEditView');
        Route::get('/team-management/update-status/{id}', [TeamManagementController::class, 'updateStatus'])->name('team_management.updateStatus');
        Route::get('/team-management/view/{id}', [TeamManagementController::class, 'show'])->name('team_management.show');
        Route::get('/team-management/cancel-invite/{id}', [TeamManagementController::class, 'cancelInvite'])->name('team_management.cancelInvite');

        //Developments Routes
        Route::match(['get', 'post'],'/developments', [DevelopmentController::class, 'index'])->name('developments.index');
        Route::post('/developments/store', [DevelopmentController::class, 'store'])->name('developments.store');
        Route::post('/developments/update/{id}', [DevelopmentController::class, 'update'])->name('developments.update');
        Route::match(['get', 'post'],'/developments/manage/{id}', [DevelopmentController::class, 'manage'])->name('developments.manage');
        Route::get('/developments/delete/{id}', [DevelopmentController::class, 'destroy'])->name('developments.destroy');
        Route::get('/developments/unit/delete/{id}', [DevelopmentController::class, 'unitDestroy'])->name('developments.unit.destroy');
        Route::get('/developments/load-edit-view/{id}', [DevelopmentController::class, 'loadEditView'])->name('developments.loadEditView');
        Route::post('/developments/manage/add-unit/{id}', [DevelopmentController::class, 'addUnit'])->name('developments.addUnit');
        Route::get('/developments/create-unit', [PropertyController::class, 'createNewPropertyPage'])->name('developments.createUnit');
        Route::post('/developments/submit-uploaded-properties/{id}', [DevelopmentController::class, 'submitUploadedProperties'])->name('developments.submitUploadedProperties');


        //Files Routes
        Route::match(['get', 'post'],'/files/{id}', [FileController::class, 'index'])->name('files.index');
        Route::post('/files/store/{id}', [FileController::class, 'store'])->name('files.store');
        Route::get('/files/delete/{id}', [FileController::class, 'destroy'])->name('files.destroy');
        Route::get('/get/files/{id}', [FileController::class, 'getFiles'])->name('get.files');
        Route::get('/get/data/files/{id}', [FileController::class, 'filesData'])->name('files.data');

        //Folder Routes
        Route::get('/files', [UserFileFoldersController::class, 'index'])->name('folder.index');
        Route::post('/folder/store', [UserFileFoldersController::class, 'store'])->name('folder.store');
        Route::post('/folder/edit', [UserFileFoldersController::class, 'edit'])->name('folder.edit');
        Route::get('/folder/delete/{id}', [UserFileFoldersController::class, 'destroy'])->name('folder.destroy');
        Route::post('/folder/loadFolderData', [UserFileFoldersController::class, 'loadFolderData'])->name('folder.loadFolderData');

        //Beta Agents Routes
        Route::match(['get', 'post'],'/beta-agents', [BetaAgentController::class, 'index'])->name('beta_agents.index');
        Route::get('/export-beta-agents', [BetaAgentController::class, 'exportBetaAgents'])->name('beta_agents.exportBetaAgents');

         //Beta Developers Routes
        Route::match(['get', 'post'],'/beta-developers', [BetaDeveloperController::class, 'index'])->name('beta_developers.index');
        Route::get('/export-beta-developer', [BetaDeveloperController::class, 'exportBetaDevelopers'])->name('beta_developers.exportBetaDevelopers');
        // Route::post('/load-beta-developer-data',[BetaDeveloperController::class, 'loadBetaDeveloperData'])->name('developer.loadBetaDeveloperData');

        //Newsletters Routes
        Route::match(['get', 'post'],'/newsletters', [NewsletterController::class, 'index'])->name('newsletters.index');
        Route::get('/export-newsletters', [NewsletterController::class, 'exportNewsletters'])->name('newsletters.exportNewsletters');

        //Chat Related Routes
        Route::match(['get', 'post'],'/messages', [MessageController::class, 'index'])->name('messages.index');
        Route::match(['get', 'post'],'/messages/get-user-chat-mesasges', [MessageController::class, 'getUserChatMessage'])->name('messages.getUserChatMessage');
        Route::match(['get', 'post'],'/messages/load-group-members/{groupId}', [MessageController::class, 'loadGroupMembers'])->name('messages.loadGroupMembers');
        Route::match(['get', 'post'],'/messages/load-chat-uploads/{groupId}', [MessageController::class, 'loadChatUploads'])->name('messages.loadChatUploads');
        Route::match(['get', 'post'],'/messages/leave-group/{groupId}', [MessageController::class, 'leaveGroup'])->name('messages.leaveGroup');
        Route::match(['get', 'post'],'/messages/update-group/{groupId}', [MessageController::class, 'updateGroup'])->name('messages.updateGroup');
        Route::match(['get', 'post'],'/messages/upload-group-image/{groupId}', [MessageController::class, 'uploadGroupImage'])->name('messages.uploadGroupImage');
        Route::match(['get', 'post'],'/messages/delete-group/{groupId}', [MessageController::class, 'deleteGroup'])->name('messages.deleteGroup');
        Route::post('/messages/create-group', [MessageController::class, 'createGroup'])->name('messages.createGroup');
        Route::get('/messages/mark-as-read-messages', [MessageController::class, 'MarkAsReadMessage'])->name('messages.MarkAsReadMessage');
        Route::get('/messages/mark-as-read-messages-all', [MessageController::class, 'markAllAsReadMessage'])->name('messages.markAllAsReadMessage');
        Route::get('/messages/load-single-private-message/{messageId}', [MessageController::class, 'loadSinglePrivateMessage'])->name('messages.loadSinglePrivateMessage');
        Route::get('/messages/load-single-group-message/{messageId}', [MessageController::class, 'loadSingleGroupMessage'])->name('messages.loadSingleGroupMessage');
        Route::get('/messages/load-single-private-message-in-sidebar/{messageId}', [MessageController::class, 'loadSinglePrivateMessageInSidebar'])->name('messages.loadSinglePrivateMessageInSidebar');
        Route::get('/messages/load-single-group-message-in-sidebar/{messageId}', [MessageController::class, 'loadSingleGroupMessageInSidebar'])->name('messages.loadSingleGroupMessageInSidebar');
        Route::get('/messages/load-edit-group-view/{id}', [MessageController::class, 'loadEditGroupView'])->name('messages.loadEditGroupView');
        Route::get('/messages/mute-private-chat/{id}', [MessageController::class, 'mutePrivateChat'])->name('messages.mutePrivateChat');
        Route::get('/messages/delete-private-chat/{id}', [MessageController::class, 'deletePrivateChat'])->name('messages.deletePrivateChat');
        Route::post('/messages/search-group-member/{groupId}', [MessageController::class, 'searchGroupMember'])->name('messages.searchGroupMember');
        Route::post('/messages/search-group-file/{groupId}', [MessageController::class, 'searchGroupFile'])->name('messages.searchGroupFile');

        Route::get('/messages/mute-group-chat/{id}', [MessageController::class, 'muteGroupChat'])->name('messages.muteGroupChat');
        Route::get('/messages/load-group-details/{groupId}', [MessageController::class, 'loadGroupDetails'])->name('messages.loadGroupDetails');

        //Agents Routes
        Route::match(['get', 'post'],'/connections/{value?}', [AgentController::class, 'index'])->name('agents.index');
        Route::match(['get', 'post'],'/agents/search', [AgentSearchController::class, 'index'])->name('agentSearch.index');
        Route::match(['get', 'post'],'/agents/view-agent/{id}/{value?}', [AgentController::class, 'viewAgent'])->name('agents.viewAgent');
        Route::match(['get', 'post'],'/agents/view-agent/developers/manage/{developmentId}', [DevelopmentController::class, 'manage'])->name('network_connections.viewDevelopment');
        
        Route::match(['get', 'post'],'/agents/view-agent/properties/create/{userId}', [UserController::class, 'userPropertiesCreate'])->name('agents.userPropertiesCreate');
        Route::match(['get', 'post'],'/agents/view-agent/properties/edit/{userId}/{reference}', [UserController::class, 'userPropertiesCreate'])->name('agents.userPropertiesEdit');
        Route::match(['get', 'post'],'/agents/view-agent/properties/view/{userId}/{reference}', [AgentController::class, 'userPropertiesShow'])->name('agents.userPropertiesShow');
        Route::post('/property/collaborate', [PropertyController::class, 'collaborate'])->name('property.collaborate');
        Route::post('/property/makeCollaboration', [PropertyController::class, 'makeCollaboration'])->name('property.makeCollaboration');
        Route::get('/property/getProperty/{id}', [PropertyController::class, 'getProperty'])->name('property.getProperty');
        Route::post('/property/getCustomer', [PropertyController::class, 'getCustomer'])->name('property.getCustomer');
        //customer inquiry
        Route::post('/property/customerInquiry', [PropertyController::class, 'saveCustomerInquiry'])->name('property.customerInquiry');
        //commission
        Route::post('/property/create-commission', [PropertyController::class, 'createCommission'])->name('property.createCommission');

        //save signature
        Route::post('/property/save-signature', [PropertyController::class, 'savesignature'])->name('property.savesignature');

        //pdf
        Route::post('/generatepdf', [PropertyController::class, 'generatePDF'])->name('generate.pdf');

        //reject agreement
        Route::post('/rejectAgreement', [PropertyController::class, 'rejectAgreement'])->name('property.rejectAgreement');

        //accept agreement
        Route::post('/acceptAgreement', [PropertyController::class, 'acceptAgreement'])->name('property.acceptAgreement');


        //Miscellaneous Routes
        Route::post('miscellaneous/refresh-filter-data', [MiscellaneousController::class, 'refreshFilterData'])->name('miscellaneous.refreshFilterData');
        Route::post('miscellaneous/accept-reject-request', [MiscellaneousController::class, 'acceptRejectRequest'])->name('miscellaneous.acceptRejectRequest');
        Route::post('miscellaneous/send-request-to-agent', [MiscellaneousController::class, 'sendRequestToAgent'])->name('miscellaneous.sendRequestToAgent');
        Route::post('miscellaneous/fetch-notifications', [MiscellaneousController::class, 'fetchNotifications'])->name('miscellaneous.fetchNotifications');
        Route::post('miscellaneous/fetch-requests', [MiscellaneousController::class, 'fetchRequests'])->name('miscellaneous.fetchRequests');

        //Users Routes
        Route::match(['get', 'post'],'/users', [UserController::class, 'index'])->name('user.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/users/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/users/{id}', [UserController::class, 'update'])->name('user.update');
        Route::get('/users/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
        Route::match(['get', 'post'],'/users/properties/{id}', [UserController::class, 'userProperties'])->name('user.userProperties');
        Route::match(['get', 'post'],'/users/properties/create/{userId}', [UserController::class, 'userPropertiesCreate'])->name('user.userPropertiesCreate');
        Route::match(['get', 'post'],'/users/properties/edit/{userId}/{reference}', [UserController::class, 'userPropertiesCreate'])->name('user.userPropertiesEdit');
        Route::match(['get', 'post'],'/users/properties/view/{userId}/{reference}', [AgentController::class, 'userPropertiesShow'])->name('user.userPropertiesShow');

        //Developers Routes
        Route::match(['get', 'post'],'/developers', [DeveloperController::class, 'index'])->name('developer.index');
        Route::get('/developer-change-status/{developerId}', [DeveloperController::class, 'developerRequestStatus'])->name('developer.changeStatus');
        Route::post('/load-developer-data',[DeveloperController::class, 'loadDeveloperData'])->name('developer.loadDeveloperData');
        Route::get('/developer-getDeveloperDetailSideview/{developerId}', [DeveloperController::class, 'getDeveloperDetailSideview'])->name('developer.getDeveloperDetailSideview');

        //Events Routes
        Route::post('events/store/{id?}', [EventController::class, 'store'])->name('events.store');
        Route::get('events/delete/{id}', [EventController::class, 'destroy'])->name('events.destroy');
        Route::get('events/get-event-detail-sideview/{id}',[EventController::class, 'getEventDetailSideview'])->name('events.getEventDetailSideview');
        Route::post('events/get-event-edit-sideview/{id}',[EventController::class, 'getEventEditSideview'])->name('events.getEventEditSideview');
        Route::post('events/add-attachments',[EventController::class, 'addAttachments'])->name('events.addAttachments');
        Route::get('remove-event-attachement/{id}', [DashboardController::class, 'removeEventAttachement'])->name('user.removeEventAttachement');
        Route::get('events-property-load/{id?}', [EventController::class, 'associationDataLoad'])->name('events.associationDataLoad');
    });


    // //Properties Routes
    // Route::match(['get', 'post'],'/properties', [PropertyController::class, 'index'])->name('properties.index');
    // Route::match(['get', 'post'],'/properties/search', [PropertySearchController::class, 'index'])->name('propertySearch.index');
    // Route::get('/properties/create', [PropertyController::class, 'create'])->name('properties.create');

    // Route::get('/properties/edit/{reference?}', [PropertyController::class, 'create'])->name('properties.edit');
    // Route::post('/properties/store/{id?}', [PropertyController::class, 'store'])->name('properties.store');
    // Route::get('properties/view/{reference}', [PropertyController::class, 'show'])->name('properties.show');
    // Route::get('/get-agent-details/{id}', [PropertyController::class, 'getAgentDetails'])->name('properties.getAgentDetails');
    // Route::get('/properties/delete/{id}', [PropertyController::class, 'destroy'])->name('properties.destroy');

    // //Agents Routes
    // Route::match(['get', 'post'],'/agents', [AgentController::class, 'index'])->name('agents.index');
    // Route::match(['get', 'post'],'/agents/search', [AgentSearchController::class, 'index'])->name('agentSearch.index');
    // Route::match(['get', 'post'],'/agents/view-agent/{id}', [AgentController::class, 'viewAgent'])->name('agents.viewAgent');
    // Route::match(['get', 'post'],'/agents/view-agent/properties/create/{userId}', [UserController::class, 'userPropertiesCreate'])->name('agents.userPropertiesCreate');
    // Route::match(['get', 'post'],'/agents/view-agent/properties/edit/{userId}/{reference}', [UserController::class, 'userPropertiesCreate'])->name('agents.userPropertiesEdit');
    // Route::match(['get', 'post'],'/agents/view-agent/properties/view/{userId}/{reference}', [AgentController::class, 'userPropertiesShow'])->name('agents.userPropertiesShow');



    // //Miscellaneous Routes
    // Route::post('miscellaneous/refresh-filter-data', [MiscellaneousController::class, 'refreshFilterData'])->name('miscellaneous.refreshFilterData');
    // Route::post('miscellaneous/accept-reject-request', [MiscellaneousController::class, 'acceptRejectRequest'])->name('miscellaneous.acceptRejectRequest');
    // Route::post('miscellaneous/send-request-to-agent', [MiscellaneousController::class, 'sendRequestToAgent'])->name('miscellaneous.sendRequestToAgent');
    // Route::post('miscellaneous/fetch-notifications', [MiscellaneousController::class, 'fetchNotifications'])->name('miscellaneous.fetchNotifications');
    // Route::post('miscellaneous/fetch-requests', [MiscellaneousController::class, 'fetchRequests'])->name('miscellaneous.fetchRequests');

    // //Users Routes
    // Route::match(['get', 'post'],'/users', [UserController::class, 'index'])->name('user.index');
    // Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
    // Route::post('/users/store', [UserController::class, 'store'])->name('user.store');
    // Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    // Route::put('/users/{id}', [UserController::class, 'update'])->name('user.update');
    // Route::get('/users/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    // Route::match(['get', 'post'],'/users/properties/{id}', [UserController::class, 'userProperties'])->name('user.userProperties');
    // Route::match(['get', 'post'],'/users/properties/create/{userId}', [UserController::class, 'userPropertiesCreate'])->name('user.userPropertiesCreate');
    // Route::match(['get', 'post'],'/users/properties/edit/{userId}/{reference}', [UserController::class, 'userPropertiesCreate'])->name('user.userPropertiesEdit');
    // Route::match(['get', 'post'],'/users/properties/view/{userId}/{reference}', [AgentController::class, 'userPropertiesShow'])->name('user.userPropertiesShow');



    //Profile Setup Routes
    Route::get('profile-setup', [ProfileSetupController::class, 'profileSetup'])->name('user.profileSetup');
    Route::post('store-profile-setup-data', [ProfileSetupController::class, 'storeProfileSetupData'])->name('user.storeProfileSetupData');
    Route::post('upload-certificates', [ProfileSetupController::class, 'uploadCertificates'])->name('user.uploadCertificates');
    Route::post('upload-certificates', [ProfileSetupController::class, 'uploadCertificates'])->name('user.uploadCertificates');
    Route::post('govt-upload-certificates', [ProfileSetupController::class, 'uploadGovtCertificates'])->name('user.uploadGovtCertificates');
    Route::get('remove-certificate/{id}', [ProfileSetupController::class, 'removeCertificate'])->name('user.removeCertificate');
    Route::get('remove-certificate/{id}', [ProfileSetupController::class, 'removeCertificate'])->name('user.removeCertificate');
    Route::get('download-gov-certificate/{id}', [ProfileSetupController::class, 'downloadGovCertificate'])->name('user.downloadGovCertificate');
    //Logout
    Route::get('logout', [AuthController::class, 'logout'])->name('user.logout');

    //Language Switching Route
    Route::get('lang/{locale}', [LocalizationController::class, 'setLocale'])->name('user.setLocale');
};

if($appMode == 'local' ){

    Route::middleware(['AuthAdminMiddleware','UserPermissionMiddleware'])->prefix('admin')->name('admin-')->group($crmRoutes);

    Route::middleware(['AuthAgentMiddleware','UserPermissionMiddleware'])->prefix('agent')->name('agent-')->group($crmRoutes);

    Route::middleware(['AuthCustomerMiddleware','UserPermissionMiddleware'])->prefix('customer')->name('customer-')->group($crmRoutes);

    Route::middleware(['AuthDeveloperMiddleware','UserPermissionMiddleware'])->prefix('developer')->name('developer-')->group($crmRoutes);

    Route::middleware(['AuthSubAgentMiddleware','UserPermissionMiddleware'])->prefix('sub-agent')->name('sub-agent-')->group($crmRoutes);

    Route::middleware(['AuthSubDeveloperMiddleware','UserPermissionMiddleware'])->prefix('sub-developer')->name('sub-developer-')->group($crmRoutes);
}else if($appMode == 'staging'){
    // Auth Routes
    Route::domain('www.staging.inmoconnect.com')->middleware(['AuthAdminMiddleware','UserPermissionMiddleware'])->prefix('admin')->name('admin-')->group($crmRoutes);

    Route::domain('www.staging.inmoconnect.com')->middleware(['AuthAgentMiddleware','UserPermissionMiddleware'])->prefix('agent')->name('agent-')->group($crmRoutes);

    Route::domain('www.staging.inmoconnect.com')->middleware(['AuthCustomerMiddleware','UserPermissionMiddleware'])->prefix('customer')->name('customer-')->group($crmRoutes);

    Route::domain('www.staging.inmoconnect.com')->middleware(['AuthDeveloperMiddleware','UserPermissionMiddleware'])->prefix('developer')->name('developer-')->group($crmRoutes);
    Route::domain('www.staging.inmoconnect.com')->middleware(['AuthSubAgentMiddleware','UserPermissionMiddleware'])->prefix('sub-agent')->name('sub-agent-')->group($crmRoutes);
    Route::domain('www.staging.inmoconnect.com')->middleware(['AuthSubDeveloperMiddleware','UserPermissionMiddleware'])->prefix('sub-developer')->name('sub-developer-')->group($crmRoutes);
}else if($appMode == 'p4staging'){
    // Auth Routes
    Route::domain('www.p4staging.inmoconnect.com')->middleware(['AuthAdminMiddleware','UserPermissionMiddleware'])->prefix('admin')->name('admin-')->group($crmRoutes);

    Route::domain('www.p4staging.inmoconnect.com')->middleware(['AuthAgentMiddleware','UserPermissionMiddleware'])->prefix('agent')->name('agent-')->group($crmRoutes);

    Route::domain('www.p4staging.inmoconnect.com')->middleware(['AuthCustomerMiddleware','UserPermissionMiddleware'])->prefix('customer')->name('customer-')->group($crmRoutes);

    Route::domain('www.p4staging.inmoconnect.com')->middleware(['AuthDeveloperMiddleware','UserPermissionMiddleware'])->prefix('developer')->name('developer-')->group($crmRoutes);

    Route::domain('www.p4staging.inmoconnect.com')->middleware(['AuthSubAgentMiddleware','UserPermissionMiddleware'])->prefix('sub-agent')->name('sub-agent-')->group($crmRoutes);

    Route::domain('www.p4staging.inmoconnect.com')->middleware(['AuthSubDeveloperMiddleware','UserPermissionMiddleware'])->prefix('sub-developer')->name('sub-developer-')->group($crmRoutes);
}else if($appMode == 'production'){
    // Auth Routes
    Route::domain('www.dashboard.inmoconnect.com')->middleware(['AuthAdminMiddleware','UserPermissionMiddleware'])->prefix('admin')->name('admin-')->group($crmRoutes);

    Route::domain('www.dashboard.inmoconnect.com')->middleware(['AuthAgentMiddleware','UserPermissionMiddleware'])->prefix('agent')->name('agent-')->group($crmRoutes);

    Route::domain('www.dashboard.inmoconnect.com')->middleware(['AuthCustomerMiddleware','UserPermissionMiddleware'])->prefix('customer')->name('customer-')->group($crmRoutes);

    Route::domain('www.dashboard.inmoconnect.com')->middleware(['AuthDeveloperMiddleware','UserPermissionMiddleware'])->prefix('developer')->name('developer-')->group($crmRoutes);

    Route::domain('www.dashboard.inmoconnect.com')->middleware(['AuthSubAgentMiddleware','UserPermissionMiddleware'])->prefix('sub-agent')->name('sub-agent-')->group($crmRoutes);

    Route::domain('www.dashboard.inmoconnect.com')->middleware(['AuthSubDeveloperMiddleware','UserPermissionMiddleware'])->prefix('sub-developer')->name('sub-developer-')->group($crmRoutes);
}



Route::get('/test-components', function(){
    return view('modules.test.test-components');
})->name('user.testComponents');

Route::get('agent/login', function(){
    return view('modules.auth.agent.login');
})->name('agent.login');

// Route::get('dashboard/index_one', function(){
//     return view('modules.dashboard.index_one');
// })->name('dashboard.index_one');

Route::get('dashboard/index_one',[DashboardController::class, 'agentDashboard'])->name('agent.dashboard');

    // New Property Route


    // End Route

Route::get('dashboard/my_project', function(){
    return view('modules.dashboard.my_project');
})->name('dashboard.my_project');

Route::get('customer/customer-index', function(){
    return view('modules.customer.customer-index');
})->name('customer.customer-index');

Route::get('date-picker/date-picker', function(){
    return view('modules.date-picker.date-picker');
})->name('date-picker.date-picker');

Route::get('test/test-components', function(){
    return view('modules.test.test-components');
})->name('test.test-components');

Route::get('test/filter', function(){
    return view('modules.test.filter');
})->name('test.filter');

Route::get('test/filter_one', function(){
    return view('modules.test.filter_one');
})->name('test.filter_one');

Route::get('test/filter_two', function(){
    return view('modules.test.filter_two');
})->name('test.filter_two');

Route::get('test/how_work', function(){
    return view('modules.test.how_work');
})->name('test.how_work');

Route::get('test/checkbox_select', function(){
    return view('modules.test.checkbox_select');
})->name('test.checkbox_select');

Route::get('dashboard/empty-dashboard', function(){
    return view('modules.dashboard.empty-dashboard');
})->name('dashboard.empty-dashboard');

Route::get('dashboard/edit_profile', function(){
    return view('modules.dashboard.edit_profile');
})->name('dashboard.edit_profile');

Route::get('agent/personal-information', function(){
    return view('modules.auth.agent.personal-information');
})->name('agent.presonal-information');



Route::get('customer/login', function(){
    return view('modules.auth.customer.login');
})->name('customer.login');

Route::get('chat/chat_message', function(){
    return view('modules.chat.chat_message');
})->name('chat.chat_message');

Route::get('chat/chat_message_group', function(){
    return view('modules.chat.chat_message_group');
})->name('chat.chat_message_group');


Route::get('my_project/empty_project', function(){
    return view('modules.my_project.empty_project');
})->name('my_project.empty_project');

Route::get('customer/customer-empty', function(){
    return view('modules.customer.customer-empty');
})->name('customer.customer-empty');

Route::get('customer/customer_table', function(){
    return view('modules.customer.customer_table');
})->name('customer.customer_table');

Route::get('my_project/dashboard', function(){
    return view('modules.my_project.dashboard');
})->name('my_project.dashboard');

Route::get('my_project/Add_property', function(){
    return view('modules.my_project.Add_property');
})->name('my_project.Add_property');

Route::get('my_project/edit_property', function(){
    return view('modules.my_project.edit_property');
})->name('my_project.edit_property');

Route::get('my_project/customer_view', function(){
    return view('modules.my_project.customer_view');
})->name('my_project.customer_view');

Route::get('test/date_picker', function(){
    return view('modules.test.date_picker');
})->name('test.date_picker');

Route::get('test/choose_file', function(){
    return view('modules.test.choose_file');
})->name('test.choose_file');

Route::get('calender/my_calender', function(){
    return view('modules.calender.my_calender');
})->name('calender.my_calender');

// ///////////////////////////////done-with responsive////////////////////////////////////////////
Route::get('agent/certificate', function(){
    return view('modules.auth.agent.certificate');
})->name('agent.certificate');

Route::get('agent/agent_ptofile', function(){
    return view('modules.auth.agent.agent_profile');
})->name('agent.agent_profile');


Route::get('create-account', function(){
    return view('modules.auth.create-account');
})->name('create-account');

Route::get('my_files/my_files', function(){
    return view('modules.my_files.my_files');
})->name('my_files.my_files');


Route::get('loader/loader_one', function(){
    return view('modules.loader.loader_one');
})->name('loader.loader_one');

Route::get('loader/loader_two', function(){
    return view('modules.loader.loader_two');
})->name('loader.loader_two');

Route::get('loader/loader_three', function(){
    return view('modules.loader.loader_three');
})->name('loader.loader_three');


Route::get('loader/loader_four', function(){
    return view('modules.loader.loader_four');
})->name('loader.loader_four');

Route::get('agents/agent-customer', function(){
    return view('modules.agents.agent-customer');
})->name('agents.agent-customer');

Route::get('agents/agent_agent', function(){
    return view('modules.agents.agent_agent');
})->name('agents.agent_agent');

// ////////////////////////////////////////////////////////////////////////////////////
Route::get('complete_design/P3_17/screen1', function(){
    return view('modules.complete_design.P3_17.screen1');
})->name('complete_design.P3_17.screen1');

Route::get('complete_design/P3_16/screen1', function(){
    return view('modules.complete_design.P3_16.screen1');
})->name('complete_design.P3_16.screen1');

Route::get('complete_design/P3_16/screen2', function(){
    return view('modules.complete_design.P3_16.screen2');
})->name('complete_design.P3_16.screen2');

Route::get('complete_design/P3_12/screen1', function(){
    return view('modules.complete_design.P3_12.screen1');
})->name('complete_design.P3_12.screen1');

Route::get('complete_design/P3_11/screen1', function(){
    return view('modules.complete_design.P3_11.screen1');
})->name('complete_design.P3_11.screen1');

Route::get('complete_design/P3_11/screen3', function(){
    return view('modules.complete_design.P3_11.screen3');
})->name('complete_design.P3_11.screen3');

Route::get('complete_design/P3_10/screen1', function(){
    return view('modules.complete_design.P3_10.screen1');
})->name('complete_design.P3_10.screen1');

Route::get('complete_design/P3_10/screen5', function(){
    return view('modules.complete_design.P3_10.screen5');
})->name('complete_design.P3_10.screen5');

Route::get('complete_design/P3_9/screen1', function(){
    return view('modules.complete_design.P3_9.screen1');
})->name('complete_design.P3_9.screen1');

Route::get('complete_design/P3_9/screen2', function(){
    return view('modules.complete_design.P3_9.screen2');
})->name('complete_design.P3_9.screen2');

Route::get('complete_design/P3_8/screen1', function(){
    return view('modules.complete_design.P3_8.screen1');
})->name('complete_design.P3_8.screen1');

Route::get('complete_design/P3_6/screen1', function(){
    return view('modules.complete_design.P3_6.screen1');
})->name('complete_design.P3_6.screen1');

Route::get('complete_design/P3_6/screen3', function(){
    return view('modules.complete_design.P3_6.screen3');
})->name('complete_design.P3_6.screen3');

Route::get('complete_design/P3_6/screen5', function(){
    return view('modules.complete_design.P3_6.screen5');
})->name('complete_design.P3_6.screen5');

Route::get('complete_design/P3_6/screen6', function(){
    return view('modules.complete_design.P3_6.screen6');
})->name('complete_design.P3_6.screen6');

Route::get('complete_design/P3_2/screen1', function(){
    return view('modules.complete_design.P3_2.screen1');
})->name('complete_design.P3_2.screen1');

Route::get('complete_design/P4_5/screen2', function(){
    return view('modules.complete_design.P4_5.screen2');
})->name('complete_design.P4_5.screen2');

Route::get('complete_design/P4_5/screen3', function(){
    return view('modules.complete_design.P4_5.screen3');
})->name('complete_design.P4_5.screen3');

Route::get('complete_design/P4_5/screen4', function(){
    return view('modules.complete_design.P4_5.screen4');
})->name('complete_design.P4_5.screen4');

Route::get('complete_design/P4_5/screen8', function(){
    return view('modules.complete_design.P4_5.screen8');
})->name('complete_design.P4_5.screen8');

Route::get('complete_design/P4_5/screen9', function(){
    return view('modules.complete_design.P4_5.screen9');
})->name('complete_design.P4_5.screen9');

Route::get('complete_design/P4_5/screen1', function(){
    return view('modules.complete_design.P4_5.screen1');
})->name('complete_design.P4_5.screen1');

Route::get('complete_design/P4_5/screen14', function(){
    return view('modules.complete_design.P4_5.screen14');
})->name('complete_design.P4_5.screen14');

Route::get('complete_design/P4_5/screen15', function(){
    return view('modules.complete_design.P4_5.screen15');
})->name('complete_design.P4_5.screen15');

Route::get('complete_design/P4_5/screen23', function(){
    return view('modules.complete_design.P4_5.screen23');
})->name('complete_design.P4_5.screen23');

Route::get('complete_design/P4_5/screen11', function(){
    return view('modules.complete_design.P4_5.screen11');
})->name('complete_design.P4_5.screen11');

Route::get('complete_design/P4_5/screen11-2', function(){
    return view('modules.complete_design.P4_5.screen11-2');
})->name('complete_design.P4_5.screen11-2');

Route::get('complete_design/P4_11/screen1', function(){
    return view('modules.complete_design.P4_11.screen1');
})->name('complete_design.P4_11.screen1');

Route::get('complete_design/P4_11/screen2', function(){
    return view('modules.complete_design.P4_11.screen2');
})->name('complete_design.P4_11.screen2');

Route::get('complete_design/P4_12/screen9', function(){
    return view('modules.complete_design.P4_12.screen9');
})->name('complete_design.P4_12.screen9');

Route::get('complete_design/P4_12/screen3', function(){
    return view('modules.complete_design.P4_12.screen3');
})->name('complete_design.P4_12.screen3');

// Route::get('complete_design/P4_12/screen6', function(){
//     return view('modules.complete_design.P4_12.screen6');
// })->name('complete_design.P4_12.screen6');

Route::get('complete_design/P4_11/screen4', function(){
    return view('modules.complete_design.P4_11.screen4');
})->name('complete_design.P4_11.screen4');

Route::get('complete_design/P4_5/screen17', function(){
    return view('modules.complete_design.P4_5.screen17');
})->name('complete_design.P4_5.screen17');

Route::get('complete_design/P4_16/screen14', function(){
    return view('modules.complete_design.P4_16.screen14');
})->name('complete_design.P4_16.screen14');

Route::get('complete_design/P4_16/screen16', function(){
    return view('modules.complete_design.P4_16.screen16');
})->name('complete_design.P4_16.screen16');

Route::get('complete_design/P4_16/screen7', function(){
    return view('modules.complete_design.P4_16.screen7');
})->name('complete_design.P4_16.screen7');

Route::get('complete_design/P4_16/screen18', function(){
    return view('modules.complete_design.P4_16.screen18');
})->name('complete_design.P4_16.screen18');

Route::get('complete_design/P4_16/screen23', function(){
    return view('modules.complete_design.P4_16.screen23');
})->name('complete_design.P4_16.screen23');

Route::get('complete_design/P4_16/screen29', function(){
    return view('modules.complete_design.P4_16.screen29');
})->name('complete_design.P4_16.screen29');

Route::get('complete_design/P4_13/screen1', function(){
    return view('modules.complete_design.P4_13.screen1');
})->name('complete_design.P4_13.screen1');

Route::get('complete_design/P4_13/screen8', function(){
    return view('modules.complete_design.P4_13.screen8');
})->name('complete_design.P4_13.screen8');

Route::get('complete_design/P4_13/screen11', function(){
    return view('modules.complete_design.P4_13.screen11');
})->name('complete_design.P4_13.screen11');

Route::get('complete_design/P4_13/screen20', function(){
    return view('modules.complete_design.P4_13.screen20');
})->name('complete_design.P4_13.screen20');

Route::get('complete_design/P4_13/screen35', function(){
    return view('modules.complete_design.P4_13.screen35');
})->name('complete_design.P4_13.screen35');

Route::get('complete_design/P4_12/screen11', function(){
    return view('modules.complete_design.P4_12.screen11');
})->name('complete_design.P4_12.screen11');

Route::get('complete_design/P4_12/screen22', function(){
    return view('modules.complete_design.P4_12.screen22');
})->name('complete_design.P4_12.screen22');


Route::get('complete_design/P4_16/screen8', function(){
    return view('modules.complete_design.P4_16.screen8');
})->name('complete_design.P4_16.screen8');

Route::get('complete_design/P4_17/screen2', function(){
    return view('modules.complete_design.P4_17.screen2');
})->name('complete_design.P4_17.screen2');

Route::get('complete_design/P4_17/screen3', function(){
    return view('modules.complete_design.P4_17.screen3');
})->name('complete_design.P4_17.screen3');

Route::get('complete_design/P4_17/screen5', function(){
    return view('modules.complete_design.P4_17.screen5');
})->name('complete_design.P4_17.screen5');

Route::get('complete_design/P4_17/screen9', function(){
    return view('modules.complete_design.P4_17.screen9');
})->name('complete_design.P4_17.screen9');

Route::get('complete_design/P4_17/screen15', function(){
    return view('modules.complete_design.P4_17.screen15');
})->name('complete_design.P4_17.screen15');

Route::get('complete_design/P4_15/screen3', function(){
    return view('modules.complete_design.P4_15.screen3');
})->name('complete_design.P4_15.screen3');

Route::get('complete_design/P4_15/screen7', function(){
    return view('modules.complete_design.P4_15.screen7');
})->name('complete_design.P4_15.screen7');

Route::get('complete_design/P4_15/screen8', function(){
    return view('modules.complete_design.P4_15.screen8');
})->name('complete_design.P4_15.screen8');

Route::get('complete_design/P4_15/screen9', function(){
    return view('modules.complete_design.P4_15.screen9');
})->name('complete_design.P4_15.screen9');

Route::get('complete_design/P4_13/screen30_3', function(){
    return view('modules.complete_design.P4_13.screen30_3');
})->name('complete_design.P4_13.screen30_3');

Route::get('complete_design/P4_13/screen_30_1', function(){
    return view('modules.complete_design.P4_13.screen_30_1');
})->name('complete_design.P4_13.screen_30_1');

Route::get('complete_design/P4_26/screen1', function(){
    return view('modules.complete_design.P4_26.screen1');
})->name('complete_design.P4_26.screen1');

Route::get('complete_design/P4_26/screen3', function(){
    return view('modules.complete_design.P4_26.screen3');
})->name('complete_design.P4_26.screen3');

Route::get('complete_design/P4_26/screen5', function(){
    return view('modules.complete_design.P4_26.screen5');
})->name('complete_design.P4_26.screen5');

Route::get('complete_design/P4_29/screen2', function(){
    return view('modules.complete_design.P4_29.screen2');
})->name('complete_design.P4_29.screen2');

Route::get('complete_design/P4_23/screen1', function(){
    return view('modules.complete_design.P4_23.screen1');
})->name('complete_design.P4_23.screen1');

Route::get('complete_design/P4_23/screen7', function(){
    return view('modules.complete_design.P4_23.screen7');
})->name('complete_design.P4_23.screen7');

Route::get('complete_design/P4_23/screen9', function(){
    return view('modules.complete_design.P4_23.screen9');
})->name('complete_design.P4_23.screen9');

Route::get('complete_design/P4_29/screen1', function(){
    return view('modules.complete_design.P4_29.screen1');
})->name('complete_design.P4_29.screen1');

Route::get('complete_design/P4_16/screen6', function(){
    return view('modules.complete_design.P4_16.screen6');
})->name('complete_design.P4_16.screen6');



Route::get('complete_design/property_add/screen1', function(){
    return view('modules.complete_design.property_add.screen1');
})->name('complete_design.property_add.screen1');

Route::get('complete_design/property_add/screen2', function(){
    return view('modules.complete_design.property_add.screen2');
})->name('complete_design.property_add.screen2');

Route::get('complete_design/P4_26/screen1', function(){
    return view('modules.complete_design.P4_26.screen1');
})->name('complete_design.P4_26.screen1');

Route::get('complete_design/P4_26/screen3', function(){
    return view('modules.complete_design.P4_26.screen3');
})->name('complete_design.P4_26.screen3');

Route::get('complete_design/P4_26/screen5', function(){
    return view('modules.complete_design.P4_26.screen5');
})->name('complete_design.P4_26.screen5');


Route::get('/logs/{date}', function ($date) {
    $filePath = storage_path("logs/inmoconnect-{$date}.log");
    if (file_exists($filePath)) {
        return response()->file($filePath);
    } else {
        return response("Log file for {$date} not found.", 404);
    }
})->where('date', '\d{4}-\d{2}-\d{2}');

$landingPageRoutes = function() {

    Route::get('coming_soon', function(){
        return view('modules.landing_page.coming_soon');
    })->name('landing_page.coming_soon');
    Route::post('/claim-your-spot', [BetaAgentController::class, 'store'])->name('user.claimYourSpot');
    Route::post('/subscribe-newsletter', [NewsletterController::class, 'store'])->name('user.subscribeNewsletter');
    Route::post('/post-coming-soon', [NewsletterController::class, 'postComingSoon'])->name('user.postComingSoon');

    Route::get('terms-condition', function(){
        return view('modules.landing_page.terms-condition');
    })->name('landing_page.terms-condition');

    Route::get('privacy-policy', function(){
        return view('modules.landing_page.privacy-policy');
    })->name('landing_page.privacy-policy');
};

if($appMode == 'local'){
    $landingPageRoutes();
    Route::get('landingpage', function(){
        return view('modules.landing_page.landing_page');
    })->name('landing_page.landing_page');

}else{
    Route::domain('www.inmoconnect.com')->group($landingPageRoutes);

    Route::domain('www.inmoconnect.com')->get('', function(){
            return view('modules.landing_page.landing_page');
    })->name('landing_page.landing_page');

}

Route::get('/developerpage', function(){
    return view('modules.landing_page.developer_landing_page');
})->name('landing_page.developer_landing_page');
// Route::get('/Screen_6', [MessageController::class,'index',
// return view('modules.complete_design.P4_12.screen6')]);

// Route::get('/Screen_6', [MessageController::class, 'index']);


Route::get('/xml-feed', [XmlFeedController::class, 'generateXml'])->name('xml.generate');
Route::get('/developers/xml-feed', [XmlFeedController::class, 'developersXmlFeed'])->name('xml.developers');
//Route::get('/xml-feed/import', [XmlFeedController::class, 'importXml'])->name('xml.import');
Route::get('/developers/xml-feed/import',[XmlFeedController::class,'developersImportXml'])->name('developer.ImportXml');



Route::get('/get-citiess', [MiscellaneousController::class, 'getcities'])->name('user.getcities');