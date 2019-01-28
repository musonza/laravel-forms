export default [
  { path: '/', redirect: '/forms' },
  {
    path: '/dashboard',
    name: 'dashboard',
    component: require('./pages/dashboard')
  },
  {
    path: '/forms',
    name: 'forms-index',
    component: require('./pages/forms/index')
  },
  {
    path: '/forms/:id',
    name: 'forms-edit',
    component: require('./pages/forms/edit')
  },
  {
    path: '/fields',
    name: 'fields-index',
    component: require('./pages/fields/index')
  },
  {
    path: '/forms/:id/fields/create',
    name: 'formFieldCreate',
    component: require('./pages/forms/fields/create')
  },
];