/**
 * Decode all email links printed from the security functions in PHP
 * Doesn't require jQuery to work
 */
export function decode_email() {

	let emails = document.querySelectorAll('.js-decode-email')
	
	for(let el of emails) {
		let data = el.getAttribute('data-email')
		let email = atob(data).split('').reverse().join('')
		el.setAttribute('href', 'mailto:' + email);
		if( el.textContent ) {
			el.textContent = email
		} else {
			el.innerText = email
		}
	}
}