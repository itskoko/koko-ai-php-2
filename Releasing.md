Releasing
=========

1. Verify everything works with `php test.php`.
2. Update [`History.md`](https://github.com/itskoko/koko-ai-ruby/blob/master/History.md).
3. Commit with `git commit -am "Release {version}"`
4. Tag with `git tag -a {version} -m "Version {version}"`.
5. Push to Github with `git push -u origin master && git push --tags`.
6. Go to [Packagist page](https://packagist.org/packages/koko/koko-ai) and click **Update**.
