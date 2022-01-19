import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['count'];
    static actions = ['count'];

    connect() {

        this.count = 0;

        const sample_1 = this.element.getElementsByClassName('sample-1')[0];
        const sample_2 = this.element.getElementsByClassName('sample-2')[0];

        sample_1.innerHTML = 'data-controller="sample" said = >You have clicked me 0 time';


        sample_1.addEventListener('click', () => {
            this.count++;
            sample_1.innerHTML = 'data-controller="sample" said = >You have clicked me '+this.count+' time';
            sample_2.innerHTML = 'data-controller="sample" said = >You have clicked sample_1 '+this.count+' times';
            this.countTarget.innerHTML = this.count;
        });
    }

    increment(){
        this.count++;
        this.countTarget.innerHTML = this.count;
    }
}