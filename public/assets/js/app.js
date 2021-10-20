/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ (() => {

eval("/**\n * Primary front-end script.\n *\n * Primary JavaScript file. Any includes or anything imported should be filtered through this file \n * and eventually saved back into the `/assets/js/app.js` file.\n *\n * @package   Initiator\n * @author    Benjamin Lu <benlumia007@gmail.com>\n * @copyright 2019-2020 Benjamin Lu\n * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later\n * @link      https://github.com/benlumia007/initiator\n */\n\n/**\n * A simple immediately-invoked function expression to kick-start\n * things and encapsulate our code.\n *\n * @since  1.0.0 \n * @access public\n * @return void\n */\n(function () {\n  var container, button, dropdown, icon, screenreadertext, parentLink, menu, submenu, links, i, len;\n  container = document.getElementById('masthead');\n\n  if (!container) {\n    return;\n  }\n\n  button = container.getElementsByTagName('button')[0];\n\n  if ('undefined' === typeof button) {\n    return;\n  }\n\n  menu = container.getElementsByTagName('nav')[0];\n  screenreadertext = document.createElement('span');\n  screenreadertext.classList.add('screen-reader-text');\n  screenreadertext.textContent = whiteSpektrumScreenReaderText.expandMain;\n  button.appendChild(screenreadertext);\n  parentLink = container.querySelectorAll('.menu-item-has-children, .page_item_has_children');\n\n  for (i = 0, len = parentLink.length; i < len; i++) {\n    var dropdown = document.createElement('button'),\n        submenu = parentLink[i].querySelector('.sub-menu'),\n        icon = document.createElement('span'),\n        screenreadertext = document.createElement('span');\n    icon.classList.add('fontawesome');\n    icon.setAttribute('aria-hidden', 'true');\n    screenreadertext.classList.add('screen-reader-text');\n    screenreadertext.textContent = whiteSpektrumScreenReaderText.expandChild;\n    parentLink[i].insertBefore(dropdown, submenu);\n    dropdown.classList.add('dropdown-toggle');\n    dropdown.setAttribute('aria-expanded', 'false');\n    dropdown.appendChild(icon);\n    dropdown.appendChild(screenreadertext);\n\n    dropdown.onclick = function () {\n      var parentLink = this.parentElement,\n          submenu = parentLink.querySelector('.sub-menu'),\n          screenreadertext = this.querySelector('.screen-reader-text');\n\n      if (-1 !== parentLink.className.indexOf('toggled-on')) {\n        parentLink.className = parentLink.className.replace(' toggled-on', '');\n        this.setAttribute('aria-expanded', 'false');\n        submenu.setAttribute('aria-expanded', 'false');\n        screenreadertext.textContent = whiteSpektrumScreenReaderText.expandChild;\n      } else {\n        parentLink.className += ' toggled-on';\n        this.setAttribute('aria-expanded', 'true');\n        submenu.setAttribute('aria-expanded', 'true');\n        screenreadertext.textContent = whiteSpektrumScreenReaderText.collapseChild;\n      }\n    };\n  } // Hide menu toggle button if menu is empty and return early.\n\n\n  if ('undefined' === typeof menu) {\n    button.style.display = 'none';\n    return;\n  }\n\n  menu.setAttribute('aria-expanded', 'false');\n\n  if (-1 === menu.className.indexOf('nav-menu')) {\n    menu.className += ' nav-menu';\n  }\n\n  button.onclick = function () {\n    screenreadertext = this.querySelector('.screen-reader-text');\n\n    if (-1 !== container.className.indexOf('toggled')) {\n      container.className = container.className.replace(' toggled', '');\n      button.setAttribute('aria-expanded', 'false');\n      screenreadertext.textContent = whiteSpektrumScreenReaderText.expandMain;\n      menu.setAttribute('aria-expanded', 'false');\n    } else {\n      container.className += ' toggled';\n      button.setAttribute('aria-expanded', 'true');\n      screenreadertext.textContent = whiteSpektrumScreenReaderText.collapseMain;\n      menu.setAttribute('aria-expanded', 'true');\n    }\n  }; // Get all the link elements within the primary menu.\n\n\n  links = menu.getElementsByTagName('a'); // Each time a menu link is focused or blurred, toggle focus.\n\n  for (i = 0, len = links.length; i < len; i++) {\n    links[i].addEventListener('focus', toggleFocus, true);\n    links[i].addEventListener('blur', toggleFocus, true);\n  }\n  /**\n   * Sets or removes .focus class on an element.\n   */\n\n\n  function toggleFocus() {\n    var self = this; // Move up through the ancestors of the current link until we hit .nav-menu.\n\n    while (-1 === self.className.indexOf('nav-menu')) {\n      // On li elements toggle the class .focus.\n      if ('li' === self.tagName.toLowerCase()) {\n        if (-1 !== self.className.indexOf('focus')) {\n          self.className = self.className.replace(' focus', '');\n        } else {\n          self.className += ' focus';\n        }\n      }\n\n      self = self.parentElement;\n    }\n  }\n  /**\n   * Toggles `focus` class to allow submenu access on tablets.\n   */\n\n\n  (function (container) {\n    var touchStartFn,\n        i,\n        parentLink = container.querySelectorAll('.menu-item-has-children > a, .page_item_has_children > a');\n\n    if ('ontouchstart' in window) {\n      touchStartFn = function touchStartFn(e) {\n        var menuItem = this.parentNode,\n            i;\n\n        if (!menuItem.classList.contains('focus')) {\n          e.preventDefault();\n\n          for (i = 0; i < menuItem.parentNode.children.length; ++i) {\n            if (menuItem === menuItem.parentNode.children[i]) {\n              continue;\n            }\n\n            menuItem.parentNode.children[i].classList.remove('focus');\n          }\n\n          menuItem.classList.add('focus');\n        } else {\n          menuItem.classList.remove('focus');\n        }\n      };\n\n      for (i = 0; i < parentLink.length; ++i) {\n        parentLink[i].addEventListener('touchstart', touchStartFn, false);\n      }\n    }\n  })(container);\n})();//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly93aGl0ZS1zcGVrdHJ1bS8uL3Jlc291cmNlcy9qcy9hcHAuanM/NmQ0MCJdLCJuYW1lcyI6WyJjb250YWluZXIiLCJidXR0b24iLCJkcm9wZG93biIsImljb24iLCJzY3JlZW5yZWFkZXJ0ZXh0IiwicGFyZW50TGluayIsIm1lbnUiLCJzdWJtZW51IiwibGlua3MiLCJpIiwibGVuIiwiZG9jdW1lbnQiLCJnZXRFbGVtZW50QnlJZCIsImdldEVsZW1lbnRzQnlUYWdOYW1lIiwiY3JlYXRlRWxlbWVudCIsImNsYXNzTGlzdCIsImFkZCIsInRleHRDb250ZW50Iiwid2hpdGVTcGVrdHJ1bVNjcmVlblJlYWRlclRleHQiLCJleHBhbmRNYWluIiwiYXBwZW5kQ2hpbGQiLCJxdWVyeVNlbGVjdG9yQWxsIiwibGVuZ3RoIiwicXVlcnlTZWxlY3RvciIsInNldEF0dHJpYnV0ZSIsImV4cGFuZENoaWxkIiwiaW5zZXJ0QmVmb3JlIiwib25jbGljayIsInBhcmVudEVsZW1lbnQiLCJjbGFzc05hbWUiLCJpbmRleE9mIiwicmVwbGFjZSIsImNvbGxhcHNlQ2hpbGQiLCJzdHlsZSIsImRpc3BsYXkiLCJjb2xsYXBzZU1haW4iLCJhZGRFdmVudExpc3RlbmVyIiwidG9nZ2xlRm9jdXMiLCJzZWxmIiwidGFnTmFtZSIsInRvTG93ZXJDYXNlIiwidG91Y2hTdGFydEZuIiwid2luZG93IiwiZSIsIm1lbnVJdGVtIiwicGFyZW50Tm9kZSIsImNvbnRhaW5zIiwicHJldmVudERlZmF1bHQiLCJjaGlsZHJlbiIsInJlbW92ZSJdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQyxDQUFFLFlBQVc7QUFDYixNQUFJQSxTQUFKLEVBQWVDLE1BQWYsRUFBdUJDLFFBQXZCLEVBQWlDQyxJQUFqQyxFQUF1Q0Ms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LENBQW9CRyxRQUFwQixDQUE2QjFCLE1BQTlDLEVBQXNELEVBQUViLENBQXhELEVBQTREO0FBQzNELGdCQUFLbUMsUUFBUSxLQUFLQSxRQUFRLENBQUNDLFVBQVQsQ0FBb0JHLFFBQXBCLENBQTZCdkMsQ0FBN0IsQ0FBbEIsRUFBb0Q7QUFDbkQ7QUFDQTs7QUFDRG1DLFlBQUFBLFFBQVEsQ0FBQ0MsVUFBVCxDQUFvQkcsUUFBcEIsQ0FBNkJ2QyxDQUE3QixFQUFnQ00sU0FBaEMsQ0FBMENrQyxNQUExQyxDQUFrRCxPQUFsRDtBQUNBOztBQUNETCxVQUFBQSxRQUFRLENBQUM3QixTQUFULENBQW1CQyxHQUFuQixDQUF3QixPQUF4QjtBQUNBLFNBVEQsTUFTTztBQUNONEIsVUFBQUEsUUFBUSxDQUFDN0IsU0FBVCxDQUFtQmtDLE1BQW5CLENBQTJCLE9BQTNCO0FBQ0E7QUFDRCxPQWZEOztBQWlCQSxXQUFNeEMsQ0FBQyxHQUFHLENBQVYsRUFBYUEsQ0FBQyxHQUFHSixVQUFVLENBQUNpQixNQUE1QixFQUFvQyxFQUFFYixDQUF0QyxFQUEwQztBQUN6Q0osUUFBQUEsVUFBVSxDQUFDSSxDQUFELENBQVYsQ0FBYzJCLGdCQUFkLENBQWdDLFlBQWhDLEVBQThDSyxZQUE5QyxFQUE0RCxLQUE1RDtBQUNBO0FBQ0Q7QUFDRCxHQTFCQyxFQTBCQ3pDLFNBMUJELENBQUY7QUEyQkEsQ0FuSkEiLCJzb3VyY2VzQ29udGVudCI6WyIvKipcbiAqIFByaW1hcnkgZnJvbnQtZW5kIHNjcmlwdC5cbiAqXG4gKiBQcmltYXJ5IEphdmFTY3JpcHQgZmlsZS4gQW55IGluY2x1ZGVzIG9yIGFueXRoaW5nIGltcG9ydGVkIHNob3VsZCBiZSBmaWx0ZXJlZCB0aHJvdWdoIHRoaXMgZmlsZSBcbiAqIGFuZCBldmVudHVhbGx5IHNhdmVkIGJhY2sgaW50byB0aGUgYC9hc3NldHMvanMvYXBwLmpzYCBmaWxlLlxuICpcbiAqIEBwYWNrYWdlICAgSW5pdGlhdG9yXG4gKiBAYXV0aG9yICAgIEJlbmphbWluIEx1IDxiZW5sdW1pYTAwN0BnbWFpbC5jb20+XG4gKiBAY29weXJpZ2h0IDIwMTktMjAyMCBCZW5qYW1pbiBMdVxuICogQGxpY2Vuc2UgICBodHRwczovL3d3dy5nbnUub3JnL2xpY2Vuc2VzL2dwbC0yLjAuaHRtbCBHUEwtMi4wLW9yLWxhdGVyXG4gKiBAbGluayAgICAgIGh0dHBzOi8vZ2l0aHViLmNvbS9iZW5sdW1pYTAwNy9pbml0aWF0b3JcbiAqL1xuXG4vKipcbiAqIEEgc2ltcGxlIGltbWVkaWF0ZWx5LWludm9rZWQgZnVuY3Rpb24gZXhwcmVzc2lvbiB0byBraWNrLXN0YXJ0XG4gKiB0aGluZ3MgYW5kIGVuY2Fwc3VsYXRlIG91ciBjb2RlLlxuICpcbiAqIEBzaW5jZSAgMS4wLjAgXG4gKiBAYWNjZXNzIHB1YmxpY1xuICogQHJldHVybiB2b2lkXG4gKi9cbiAoIGZ1bmN0aW9uKCkge1xuXHR2YXIgY29udGFpbmVyLCBidXR0b24sIGRyb3Bkb3duLCBpY29uLCBzY3JlZW5yZWFkZXJ0ZXh0LCBwYXJlbnRMaW5rLCBtZW51LCBzdWJtZW51LCBsaW5rcywgaSwgbGVuO1xuXG5cdGNvbnRhaW5lciA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCAnbWFzdGhlYWQnICk7XG5cdGlmICggISBjb250YWluZXIgKSB7XG5cdFx0cmV0dXJuO1xuXHR9XG5cblx0YnV0dG9uID0gY29udGFpbmVyLmdldEVsZW1lbnRzQnlUYWdOYW1lKCAnYnV0dG9uJyApWzBdO1xuXHRpZiAoICd1bmRlZmluZWQnID09PSB0eXBlb2YgYnV0dG9uICkge1xuXHRcdHJldHVybjtcblx0fVxuXG5cdG1lbnUgPSBjb250YWluZXIuZ2V0RWxlbWVudHNCeVRhZ05hbWUoICduYXYnIClbMF07XG5cblx0c2NyZWVucmVhZGVydGV4dCA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoICdzcGFuJyApO1xuXHRzY3JlZW5yZWFkZXJ0ZXh0LmNsYXNzTGlzdC5hZGQoICdzY3JlZW4tcmVhZGVyLXRleHQnICk7XG5cdHNjcmVlbnJlYWRlcnRleHQudGV4dENvbnRlbnQgPSB3aGl0ZVNwZWt0cnVtU2NyZWVuUmVhZGVyVGV4dC5leHBhbmRNYWluO1xuXHRidXR0b24uYXBwZW5kQ2hpbGQoIHNjcmVlbnJlYWRlcnRleHQgKTtcblxuXHRwYXJlbnRMaW5rID0gY29udGFpbmVyLnF1ZXJ5U2VsZWN0b3JBbGwoICcubWVudS1pdGVtLWhhcy1jaGlsZHJlbiwgLnBhZ2VfaXRlbV9oYXNfY2hpbGRyZW4nICk7XG5cblx0Zm9yICggaSA9IDAsIGxlbiA9IHBhcmVudExpbmsubGVuZ3RoOyBpIDwgbGVuOyBpKysgKSB7XG5cdFx0dmFyIGRyb3Bkb3duID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCggJ2J1dHRvbicgKSxcblx0XHRcdHN1Ym1lbnUgPSBwYXJlbnRMaW5rW2ldLnF1ZXJ5U2VsZWN0b3IoICcuc3ViLW1lbnUnICksXG5cdFx0XHRpY29uID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCggJ3NwYW4nICksXG5cdFx0XHRzY3JlZW5yZWFkZXJ0ZXh0ID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCggJ3NwYW4nICk7XG5cblx0XHRpY29uLmNsYXNzTGlzdC5hZGQoICdmb250YXdlc29tZScgKTtcblx0XHRpY29uLnNldEF0dHJpYnV0ZSggJ2FyaWEtaGlkZGVuJywgJ3RydWUnICk7XG5cblx0XHRzY3JlZW5yZWFkZXJ0ZXh0LmNsYXNzTGlzdC5hZGQoICdzY3JlZW4tcmVhZGVyLXRleHQnICk7XG5cdFx0c2NyZWVucmVhZGVydGV4dC50ZXh0Q29udGVudCA9IHdoaXRlU3Bla3RydW1TY3JlZW5SZWFkZXJUZXh0LmV4cGFuZENoaWxkO1xuXG5cdFx0cGFyZW50TGlua1tpXS5pbnNlcnRCZWZvcmUoIGRyb3Bkb3duLCBzdWJtZW51ICk7XG5cdFx0ZHJvcGRvd24uY2xhc3NMaXN0LmFkZCggJ2Ryb3Bkb3duLXRvZ2dsZScgKTtcblx0XHRkcm9wZG93bi5zZXRBdHRyaWJ1dGUoICdhcmlhLWV4cGFuZGVkJywgJ2ZhbHNlJyApO1xuXHRcdGRyb3Bkb3duLmFwcGVuZENoaWxkKCBpY29uICk7XG5cdFx0ZHJvcGRvd24uYXBwZW5kQ2hpbGQoIHNjcmVlbnJlYWRlcnRleHQgKTtcblxuXHRcdGRyb3Bkb3duLm9uY2xpY2sgPSBmdW5jdGlvbigpIHtcblx0XHRcdHZhciBwYXJlbnRMaW5rID0gdGhpcy5wYXJlbnRFbGVtZW50LFxuXHRcdFx0XHRzdWJtZW51ID0gcGFyZW50TGluay5xdWVyeVNlbGVjdG9yKCAnLnN1Yi1tZW51JyApLFxuXHRcdFx0XHRzY3JlZW5yZWFkZXJ0ZXh0ID0gdGhpcy5xdWVyeVNlbGVjdG9yKCAnLnNjcmVlbi1yZWFkZXItdGV4dCcgKTtcblxuXHRcdFx0aWYgKCAtMSAhPT0gcGFyZW50TGluay5jbGFzc05hbWUuaW5kZXhPZiggJ3RvZ2dsZWQtb24nICkgKSB7XG5cdFx0XHRcdHBhcmVudExpbmsuY2xhc3NOYW1lID0gcGFyZW50TGluay5jbGFzc05hbWUucmVwbGFjZSggJyB0b2dnbGVkLW9uJywgJycgKTtcblx0XHRcdFx0dGhpcy5zZXRBdHRyaWJ1dGUoICdhcmlhLWV4cGFuZGVkJywgJ2ZhbHNlJyApO1xuXHRcdFx0XHRzdWJtZW51LnNldEF0dHJpYnV0ZSAoICdhcmlhLWV4cGFuZGVkJywgJ2ZhbHNlJyk7XG5cdFx0XHRcdHNjcmVlbnJlYWRlcnRleHQudGV4dENvbnRlbnQgPSB3aGl0ZVNwZWt0cnVtU2NyZWVuUmVhZGVyVGV4dC5leHBhbmRDaGlsZDtcblx0XHRcdH0gZWxzZSB7XG5cdFx0XHRcdHBhcmVudExpbmsuY2xhc3NOYW1lICs9ICcgdG9nZ2xlZC1vbic7XG5cdFx0XHRcdHRoaXMuc2V0QXR0cmlidXRlKCAnYXJpYS1leHBhbmRlZCcsICd0cnVlJyApO1xuXHRcdFx0XHRzdWJtZW51LnNldEF0dHJpYnV0ZSAoICdhcmlhLWV4cGFuZGVkJywgJ3RydWUnKTtcblx0XHRcdFx0c2NyZWVucmVhZGVydGV4dC50ZXh0Q29udGVudCA9IHdoaXRlU3Bla3RydW1TY3JlZW5SZWFkZXJUZXh0LmNvbGxhcHNlQ2hpbGQ7XG5cdFx0XHR9XG5cdFx0fTtcblx0fVxuXG5cdC8vIEhpZGUgbWVudSB0b2dnbGUgYnV0dG9uIGlmIG1lbnUgaXMgZW1wdHkgYW5kIHJldHVybiBlYXJseS5cblx0aWYgKCAndW5kZWZpbmVkJyA9PT0gdHlwZW9mIG1lbnUgKSB7XG5cdFx0YnV0dG9uLnN0eWxlLmRpc3BsYXkgPSAnbm9uZSc7XG5cdFx0cmV0dXJuO1xuXHR9XG5cblx0bWVudS5zZXRBdHRyaWJ1dGUoICdhcmlhLWV4cGFuZGVkJywgJ2ZhbHNlJyApO1xuXHRcdGlmICggLTEgPT09IG1lbnUuY2xhc3NOYW1lLmluZGV4T2YoICduYXYtbWVudScgKSApIHtcblx0XHRcdG1lbnUuY2xhc3NOYW1lICs9ICcgbmF2LW1lbnUnO1xuXHRcdH1cblxuXHRidXR0b24ub25jbGljayA9IGZ1bmN0aW9uKCkge1xuXHRcdHNjcmVlbnJlYWRlcnRleHQgPSB0aGlzLnF1ZXJ5U2VsZWN0b3IoICcuc2NyZWVuLXJlYWRlci10ZXh0JyApO1xuXHRcdGlmICggLTEgIT09IGNvbnRhaW5lci5jbGFzc05hbWUuaW5kZXhPZiggJ3RvZ2dsZWQnICkgKSB7XG5cdFx0XHRjb250YWluZXIuY2xhc3NOYW1lID0gY29udGFpbmVyLmNsYXNzTmFtZS5yZXBsYWNlKCAnIHRvZ2dsZWQnLCAnJyApO1xuXHRcdFx0YnV0dG9uLnNldEF0dHJpYnV0ZSggJ2FyaWEtZXhwYW5kZWQnLCAnZmFsc2UnICk7XG5cdFx0XHRzY3JlZW5yZWFkZXJ0ZXh0LnRleHRDb250ZW50ID0gd2hpdGVTcGVrdHJ1bVNjcmVlblJlYWRlclRleHQuZXhwYW5kTWFpbjtcblx0XHRcdG1lbnUuc2V0QXR0cmlidXRlKCAnYXJpYS1leHBhbmRlZCcsICdmYWxzZScgKTtcblx0XHR9IGVsc2Uge1xuXHRcdFx0Y29udGFpbmVyLmNsYXNzTmFtZSArPSAnIHRvZ2dsZWQnO1xuXHRcdFx0YnV0dG9uLnNldEF0dHJpYnV0ZSggJ2FyaWEtZXhwYW5kZWQnLCAndHJ1ZScgKTtcblx0XHRcdHNjcmVlbnJlYWRlcnRleHQudGV4dENvbnRlbnQgPSB3aGl0ZVNwZWt0cnVtU2NyZWVuUmVhZGVyVGV4dC5jb2xsYXBzZU1haW47XG5cdFx0XHRtZW51LnNldEF0dHJpYnV0ZSggJ2FyaWEtZXhwYW5kZWQnLCAndHJ1ZScgKTtcblx0XHR9XG5cdH07XG5cblx0Ly8gR2V0IGFsbCB0aGUgbGluayBlbGVtZW50cyB3aXRoaW4gdGhlIHByaW1hcnkgbWVudS5cblxuXHRsaW5rcyA9IG1lbnUuZ2V0RWxlbWVudHNCeVRhZ05hbWUoICdhJyApO1xuXG5cdC8vIEVhY2ggdGltZSBhIG1lbnUgbGluayBpcyBmb2N1c2VkIG9yIGJsdXJyZWQsIHRvZ2dsZSBmb2N1cy5cblx0Zm9yICggaSA9IDAsIGxlbiA9IGxpbmtzLmxlbmd0aDsgaSA8IGxlbjsgaSsrICkge1xuXHRcdGxpbmtzW2ldLmFkZEV2ZW50TGlzdGVuZXIoICdmb2N1cycsIHRvZ2dsZUZvY3VzLCB0cnVlICk7XG5cdFx0bGlua3NbaV0uYWRkRXZlbnRMaXN0ZW5lciggJ2JsdXInLCB0b2dnbGVGb2N1cywgdHJ1ZSApO1xuXHR9XG5cblx0LyoqXG5cdCAqIFNldHMgb3IgcmVtb3ZlcyAuZm9jdXMgY2xhc3Mgb24gYW4gZWxlbWVudC5cblx0ICovXG5cdGZ1bmN0aW9uIHRvZ2dsZUZvY3VzKCkge1xuXHRcdHZhciBzZWxmID0gdGhpcztcblxuXHRcdC8vIE1vdmUgdXAgdGhyb3VnaCB0aGUgYW5jZXN0b3JzIG9mIHRoZSBjdXJyZW50IGxpbmsgdW50aWwgd2UgaGl0IC5uYXYtbWVudS5cblx0XHR3aGlsZSAoIC0xID09PSBzZWxmLmNsYXNzTmFtZS5pbmRleE9mKCAnbmF2LW1lbnUnICkgKSB7XG5cblx0XHRcdC8vIE9uIGxpIGVsZW1lbnRzIHRvZ2dsZSB0aGUgY2xhc3MgLmZvY3VzLlxuXHRcdFx0aWYgKCAnbGknID09PSBzZWxmLnRhZ05hbWUudG9Mb3dlckNhc2UoKSApIHtcblx0XHRcdFx0XG5cdFx0XHRcdGlmICggLTEgIT09IHNlbGYuY2xhc3NOYW1lLmluZGV4T2YoICdmb2N1cycgKSApIHtcblx0XHRcdFx0XHRzZWxmLmNsYXNzTmFtZSA9IHNlbGYuY2xhc3NOYW1lLnJlcGxhY2UoICcgZm9jdXMnLCAnJyApO1xuXHRcdFx0XHR9IGVsc2Uge1xuXHRcdFx0XHRcdHNlbGYuY2xhc3NOYW1lICs9ICcgZm9jdXMnO1xuXHRcdFx0XHR9XG5cdFx0XHR9XG5cdFx0XHRzZWxmID0gc2VsZi5wYXJlbnRFbGVtZW50O1xuXHRcdH1cblx0fVxuXG5cdC8qKlxuXHQgKiBUb2dnbGVzIGBmb2N1c2AgY2xhc3MgdG8gYWxsb3cgc3VibWVudSBhY2Nlc3Mgb24gdGFibGV0cy5cblx0ICovXG5cdCggZnVuY3Rpb24oIGNvbnRhaW5lciApIHtcblx0XHR2YXIgdG91Y2hTdGFydEZuLCBpLFxuXHRcdFx0cGFyZW50TGluayA9IGNvbnRhaW5lci5xdWVyeVNlbGVjdG9yQWxsKCAnLm1lbnUtaXRlbS1oYXMtY2hpbGRyZW4gPiBhLCAucGFnZV9pdGVtX2hhc19jaGlsZHJlbiA+IGEnICk7XG5cblx0XHRpZiAoICdvbnRvdWNoc3RhcnQnIGluIHdpbmRvdyApIHtcblx0XHRcdHRvdWNoU3RhcnRGbiA9IGZ1bmN0aW9uKCBlICkge1xuXHRcdFx0XHR2YXIgbWVudUl0ZW0gPSB0aGlzLnBhcmVudE5vZGUsIGk7XG5cblx0XHRcdFx0aWYgKCAhIG1lbnVJdGVtLmNsYXNzTGlzdC5jb250YWlucyggJ2ZvY3VzJyApICkge1xuXHRcdFx0XHRcdGUucHJldmVudERlZmF1bHQoKTtcblx0XHRcdFx0XHRmb3IgKCBpID0gMDsgaSA8IG1lbnVJdGVtLnBhcmVudE5vZGUuY2hpbGRyZW4ubGVuZ3RoOyArK2kgKSB7XG5cdFx0XHRcdFx0XHRpZiAoIG1lbnVJdGVtID09PSBtZW51SXRlbS5wYXJlbnROb2RlLmNoaWxkcmVuW2ldICkge1xuXHRcdFx0XHRcdFx0XHRjb250aW51ZTtcblx0XHRcdFx0XHRcdH1cblx0XHRcdFx0XHRcdG1lbnVJdGVtLnBhcmVudE5vZGUuY2hpbGRyZW5baV0uY2xhc3NMaXN0LnJlbW92ZSggJ2ZvY3VzJyApO1xuXHRcdFx0XHRcdH1cblx0XHRcdFx0XHRtZW51SXRlbS5jbGFzc0xpc3QuYWRkKCAnZm9jdXMnICk7XG5cdFx0XHRcdH0gZWxzZSB7XG5cdFx0XHRcdFx0bWVudUl0ZW0uY2xhc3NMaXN0LnJlbW92ZSggJ2ZvY3VzJyApO1xuXHRcdFx0XHR9XG5cdFx0XHR9O1xuXG5cdFx0XHRmb3IgKCBpID0gMDsgaSA8IHBhcmVudExpbmsubGVuZ3RoOyArK2kgKSB7XG5cdFx0XHRcdHBhcmVudExpbmtbaV0uYWRkRXZlbnRMaXN0ZW5lciggJ3RvdWNoc3RhcnQnLCB0b3VjaFN0YXJ0Rm4sIGZhbHNlICk7XG5cdFx0XHR9XG5cdFx0fVxuXHR9KCBjb250YWluZXIgKSApO1xufSApKCk7Il0sImZpbGUiOiIuL3Jlc291cmNlcy9qcy9hcHAuanMuanMiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/app.js\n");

/***/ }),

/***/ "./resources/scss/screen.scss":
/*!************************************!*\
  !*** ./resources/scss/screen.scss ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvc2Nzcy9zY3JlZW4uc2Nzcy5qcyIsIm1hcHBpbmdzIjoiO0FBQUEiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly93aGl0ZS1zcGVrdHJ1bS8uL3Jlc291cmNlcy9zY3NzL3NjcmVlbi5zY3NzPzUyNTIiXSwic291cmNlc0NvbnRlbnQiOlsiLy8gZXh0cmFjdGVkIGJ5IG1pbmktY3NzLWV4dHJhY3QtcGx1Z2luXG5leHBvcnQge307Il0sIm5hbWVzIjpbXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/scss/screen.scss\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/assets/js/app": 0,
/******/ 			"assets/css/screen": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkIds[i]] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunkwhite_spektrum"] = self["webpackChunkwhite_spektrum"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["assets/css/screen"], () => (__webpack_require__("./resources/js/app.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["assets/css/screen"], () => (__webpack_require__("./resources/scss/screen.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;