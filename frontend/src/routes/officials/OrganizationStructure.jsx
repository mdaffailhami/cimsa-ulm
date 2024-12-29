import { css } from '@emotion/react';
import { useEffect, useReducer, useState } from 'react';
import { Accordion, Container, Tab, Tabs } from 'react-bootstrap';

export default function OrganizationStructure() {
  const [isUsingAccordion, setIsUsingAccordion] = useState(false);
  const years = [
    '2018-2019',
    '2019-2020',
    '2020-2021',
    '2021-2022',
    '2022-2023',
    '2023-2024',
    '2024-2025',
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
    <Container>
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
        {years.map((year, i) => {
          return (
            <Tab key={i} eventKey={i} title={year} style={{}}>
              {(() => {
                if (isUsingAccordion) {
                  return;
                } else {
                  return <>Content for {year}</>;
                }
              })()}
            </Tab>
          );
        })}
      </Tabs>
      {isUsingAccordion && (
        <Accordion defaultActiveKey='0'>
          {years.map((year, i) => (
            <Accordion.Item key={i} eventKey={i}>
              <Accordion.Header>{year}</Accordion.Header>
              <Accordion.Body>Content for {year}</Accordion.Body>
            </Accordion.Item>
          ))}
        </Accordion>
      )}
    </Container>
  );
}
