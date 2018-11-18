export default [
  { path: '/', redirect: '/forms' },
  {
    path: '/forms',
    name: 'forms-index',
    component: require('./screens/forms/index')
  },
];
