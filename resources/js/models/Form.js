import Model from './Model';
import Field from './Field'

export default class Form extends Model {
  resource() {
    return 'forms'
  }

  fields() {
    return this.hasMany(Field)
  }
}