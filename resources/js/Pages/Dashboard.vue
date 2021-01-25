<template>
    <dashboard>
        <template #content>
            <div class="bg-gray-800 rounded">
                <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 px-4">
                    <div v-if="$page.props.jetstream.canUpdateProfileInformation">
                        <update-profile-information-form :user="$page.props.user" />

                        <jet-section-border />
                    </div>

                    <div v-if="$page.props.jetstream.canUpdatePassword">
                        <update-password-form class="mt-10 sm:mt-0" />

                        <jet-section-border />
                    </div>

                    <div v-if="$page.props.jetstream.canManageTwoFactorAuthentication">
                        <two-factor-authentication-form class="mt-10 sm:mt-0" />

                        <jet-section-border />
                    </div>

                    <logout-other-browser-sessions-form :sessions="sessions" class="mt-10 sm:mt-0" />

                    <template v-if="$page.props.jetstream.hasAccountDeletionFeatures">
                        <jet-section-border />

                        <delete-user-form class="mt-10 sm:mt-0" />
                    </template>
                </div>
            </div>
        </template>
    </dashboard>
</template>

<script>
    import Dashboard from '@/Layouts/Dashboard'
    import DeleteUserForm from './Profile/DeleteUserForm'
    import JetSectionBorder from '@/Jetstream/SectionBorder'
    import LogoutOtherBrowserSessionsForm from './Profile/LogoutOtherBrowserSessionsForm'
    import TwoFactorAuthenticationForm from './Profile/TwoFactorAuthenticationForm'
    import UpdatePasswordForm from './Profile/UpdatePasswordForm'
    import UpdateProfileInformationForm from './Profile/UpdateProfileInformationForm'

    export default {
        props: ['sessions'],

        components: {
            Dashboard,
            DeleteUserForm,
            JetSectionBorder,
            LogoutOtherBrowserSessionsForm,
            TwoFactorAuthenticationForm,
            UpdatePasswordForm,
            UpdateProfileInformationForm,
        },
    }
</script>
