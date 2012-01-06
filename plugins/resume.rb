# resume.rb
#
# Copyright (C) 2011 Tim Tregubov, Apache License
require 'linkedin'

module Jekyll
    
    class Resume < Liquid::Tag
        safe = true
        
        attr_reader :positions, :educations, :skills, :patents, :languages, :interests, :honors, :associations
        
        def initialize(name, params, tokens)
            
            # get your api keys at https://www.linkedin.com/secure/developer
            client = LinkedIn::Client.new('vc6einxqldld', 'F22TuEPWSlCQD0B2')
            #rtoken = client.request_token.token
            #rsecret = client.request_token.secret
            #
            # # to test from your desktop, open the following url in your browser
            # # and record the pin it gives you
            #client.request_token.authorize_url
            #  => "https://api.linkedin.com/uas/oauth/authorize?oauth_token=<generated_token>"
            #
            # # then fetch your access keys
            #pin = 93028
            #client.authorize_from_request(rtoken, rsecret, pin)
            # => ["OU812", "8675309"] # <= save these for future requests
            # ["636ab8b5-75fd-4058-8225-1e8e03315ad9", "69b33c54-7aa6-4178-b30a-011db20579cd"]
            #
            # # or authorize from previously fetched access keys
            client.authorize_from_access("636ab8b5-75fd-4058-8225-1e8e03315ad9", "69b33c54-7aa6-4178-b30a-011db20579cd")
            #
            #
            
            positions = client.profile(:url => 'http://www.linkedin.com/in/timtregubov',:fields => %w(positions))
            educations = client.profile(:url => 'http://www.linkedin.com/in/timtregubov',:fields => %w(educations))
            skills =  client.profile(:url => 'http://www.linkedin.com/in/timtregubov',:fields => %w(skills))
            patents = client.profile(:url => 'http://www.linkedin.com/in/timtregubov',:fields => %w(patents))
            languages = client.profile(:url => 'http://www.linkedin.com/in/timtregubov',:fields => %w(languages))
            interests = client.profile(:url => 'http://www.linkedin.com/in/timtregubov',:fields => %w(interests))
            honors = client.profile(:url => 'http://www.linkedin.com/in/timtregubov',:fields => %w(honors))
            associations = client.profile(:url => 'http://www.linkedin.com/in/timtregubov',:fields => %w(associations))
            
            

            
            
            super
        end
        
        def render(context)

            companyhtml = positions.positions.all.map do |company|
                company.each do |cont|
                    print cont[1]
                end
            end
            
            # reduce the Array of [tag name, tag weight] pairs to HTML
            #weight.reduce("") do |html, tag|
            #    name, weight = tag
            #    size = size_min + ((size_max - size_min) * weight).to_f
            #    size = sprintf("%.#{@precision}f", size)
            #    html << "<a style='font-size: #{size}#{unit}' href='/#{tag_dir}/#{name.gsub(/_|\W/, '-')}'>#{name}</a>\n"
            #end
        end
        
        private
        
        def hash_to_html(depth, mainclass)
            lambda do |key,value|
                puts " "*depth + "<div class=#{key}>"
                if value.nil?
                    # do nothing
                    # (single this case out, so as not to raise an error here)
                    elsif value.is_a?(Hash)
                    puts " "*(depth+1) + "<div class=#{mainclass}>"
                    value.each(&hash_to_html(depth+2, mainclass))
                    else
                    fail "I don't know what to do with a #{value.class}"
                    puts "</div>"
                end
                puts "</div>"
            end
        end
        
        #puts "%ul"
        #yourhash.each(&hash_to_haml(1))

        
    end
end

Liquid::Template.register_tag('resume', Jekyll::Resume)
