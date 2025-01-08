import { css, Global } from '@emotion/react';
import { useEffect, useReducer, useState } from 'react';
import { Accordion, Container, Tab, Tabs } from 'react-bootstrap';
import OrganizationStructureContent from './OrganizationStructureContent';

export default function OrganizationStructure() {
  const [isUsingAccordion, setIsUsingAccordion] = useState(false);
  const periods = [
    '2025-2026',
    '2024-2025',
    '2023-2024',
    '2022-2023',
    '2021-2022',
    '2020-2021',
    '2019-2020',
    '2018-2019',
  ];

  const [update, forceUpdate] = useReducer((x) => x + 1, 0);

  useEffect(() => {
    const onResize = () => forceUpdate();

    window.addEventListener('resize', onResize);

    return () => {
      window.removeEventListener('resize', onResize);
    };
  }, []);

  // Make About Us Section Banner height to be  based on the About Us Section Text inside
  useEffect(() => {
    const tabs = document.getElementById('tabs');

    setIsUsingAccordion(tabs.clientHeight > 45);
  }, [update]);

  return (
    <Container id='organization-structure'>
      <Global
        styles={css`
          #organization-structure .nav-link {
            color: black;
          }
          #organization-structure .nav-link.active {
            color: red;
            background: rgba(255, 0, 0, 0.012);
          }

          .accordion-button:focus {
            box-shadow: none;
            border-color: rgba(0, 0, 0, 0.125);
          }
          .accordion-button:not(.collapsed) {
            background-color: rgba(255, 0, 0, 0.1);
            color: red;
          }
        `}
      />
      <Tabs
        id='tabs'
        defaultActiveKey='0'
        fill
        css={css`
          ${(() => {
            if (isUsingAccordion) {
              return css`
                position: absolute;
                opacity: 0;
              `;
            }
          })()}
        `}
      >
        {periods.map((period, i) => {
          return (
            <Tab key={i} eventKey={i} title={period}>
              {(() => {
                if (isUsingAccordion) {
                  return;
                } else {
                  return (
                    <>
                      <br />
                      <OrganizationStructureContent period={period} />;
                      <br />
                    </>
                  );
                }
              })()}
            </Tab>
          );
        })}
      </Tabs>
      {isUsingAccordion && (
        <Accordion defaultActiveKey='0'>
          {periods.map((period, i) => (
            <Accordion.Item key={i} eventKey={i.toString()}>
              <Accordion.Header>{period}</Accordion.Header>
              <Accordion.Body>
                <OrganizationStructureContent period={period} />
              </Accordion.Body>
            </Accordion.Item>
          ))}
        </Accordion>
      )}
    </Container>
  );
}
