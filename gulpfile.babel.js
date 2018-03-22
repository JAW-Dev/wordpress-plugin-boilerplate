/**
 * Gulpfile.
 *
 * @package   package
 * @author    author <authoor-email>
 * @copyright Copyright (c) 2018, author
 * @license   GNU General Public License v2 or later
 * @version   1.0.0
 */

'use strict';

/* global require */
/* eslint no-undef: 0 */
/* eslint no-unused-expressions: 0 */

import requireDir from 'require-dir';
import {gulp} from './tasks/gulp/config/imports';

// /**
//  * The package.json package contents.
//  */
// getPackageJson: () => {
//     return JSON.parse( fs.readFileSync( './package.json', 'utf8' ) );
// },

// /**
//  * Handle Errors.
//  */
// handleErrors: ( err ) => {
//     notify.onError({
//         title: 'Error!',
//         message: '<%= error.message %>',
//         sound: 'Beep',
//     })( err );
//     return plumber();
// },

requireDir( './tasks/gulp/tasks', { recurse: true });

gulp.task( 'default', [ 'scripts', 'styles', 'imagemin', 'bump', 'pot' ]);
