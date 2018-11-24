import Model from './Model';
import Field from './Field';
import Submission from './Submission';

export default class Form extends Model {
  resource() {
    return 'forms';
  }

  fields() {
    return this.hasMany(Field);
  }

  submissions() {
    return this.hasMany(Submission);
  }
}