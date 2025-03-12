document.addEventListener('DOMContentLoaded', () => {
    const accountNumberInput = document.getElementById('accountNumber');
    const balanceSpan = document.getElementById('balance');
    const checkBalanceButton = document.getElementById('checkBalanceButton');

    // Sample page content
    const samplePage = document.createElement('div');
    samplePage.innerHTML = `
        <h1>Sample Page</h1>
        <p>This is a sample page to verify that the architecture works.</p>
    `;
    document.body.appendChild(samplePage);

    checkBalanceButton.addEventListener('click', () => {
        const accountNumber = accountNumberInput.value;
        fetch(`/api/balance?accountNumber=${accountNumber}`)
            .then(response => response.json())
            .then(data => {
                balanceSpan.textContent = data.balance;
            });
    });
});
