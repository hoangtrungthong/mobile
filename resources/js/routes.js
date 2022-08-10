export default {
    "users": {
        manageUser: `manage-user`,
        blockUser: `block-user`,
        activeUser: `active-user`,
        deleteUser: (id) => `delete-user/${id}`,
    },
    "categories": {
        delete: (id) => `categories/${id}`
    }
}