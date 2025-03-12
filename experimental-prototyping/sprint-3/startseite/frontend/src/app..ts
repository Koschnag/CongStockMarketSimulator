import ko, { Observable } from 'knockout';

class ViewModel {
    accountNumber: Observable<string>;
    balance: Observable<number | null>;

    constructor() {
        this.accountNumber = ko.observable('');
        this.balance = ko.observable(null);
    }

    checkBalance() {
        const accountNumber = this.accountNumber();
        fetch(`/api/balance?accountNumber=${accountNumber}`)
            .then(response => response.json())
            .then(data => {
                this.balance(data.balance);
            });
    }
}

ko.applyBindings(new ViewModel());